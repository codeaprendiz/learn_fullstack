#!/bin/bash

####################################################################################################
# DESCRIPTION:
#   This script is designed to integrate GitHub Actions with Slack notifications. It allows you to
#   automatically send custom notifications to a specified Slack channel whenever a GitHub Actions 
#   workflow is triggered. The notifications provide detailed insights about the workflow, 
#   including information about the user who triggered the event, the repository and commit involved,
#   the event type, job status, as well as links to the GitHub Run and Checks page.
#
#   The main goal is to provide real-time feedback on your CI/CD process directly in Slack, 
#   enabling faster response times in case of failed workflows and improved visibility of your
#   project's status across your team.
#
###################################################################################################


# Slack webhook URL
WEBHOOK_URL=$SLACK_WEBHOOK_URL  # The webhook URL that can be found in the Slack settings => WEBHOOK_URL: https://hooks.slack.com/services/XXXXXX/XXXXXX/XXXXXX , can be created here: https://api.slack.com/messaging/webhooks

# Set environment variables for all the fields
GITHUB_ACTOR="$GITHUB_ACTOR"      # The user that triggered the workflow,                       => GITHUB_ACTOR: <username_github>
REPO=$REPO                        # The repository where the event occurred,                   => REPO: <username_github>/<repo_name>
COMMIT=$COMMIT                    # The commit SHA that triggered the workflow,                => COMMIT: 1234567890
REF=$REF                          # The branch or tag ref that triggered the workflow,         => REF: refs/heads/main in push event, REF: refs/pull/3/merge in pull_request event
EVENT_NAME=$EVENT_NAME            # The name of the webhook event that triggered the workflow,  => EVENT_NAME: push in push event, EVENT_NAME: pull_request in pull_request event
WORKFLOW=$WORKFLOW                # The name of the workflow that was triggered,               => WORKFLOW: Node.js Build
JOB=$JOB                          # The name of the job that was triggered,                    => JOB: build
JOB_STATUS=$JOB_STATUS            # The status of the job (success, failure, cancelled, etc.)  => JOB_STATUS: success
COMMIT_MESSAGE=$COMMIT_MESSAGE    # The commit message that triggered the workflow,            => COMMIT_MESSAGE: chore: pass build
GITHUB_RUN_ID="https://github.com/$REPO/actions/runs/$GITHUB_RUN_ID"   #    The URL of the workflow runs list for the repository   => GITHUB_RUN_ID: https://github.com/<username>/<reponame>/actions/runs/5228830247
CHECKS_URL="https://github.com/$REPO/commit/$COMMIT/checks"


# Repo, Commit URLs and Actor avatar URL
REPO_URL="https://github.com/$REPO"                     # The URL of the repository where the event occurred   => REPO_URL: https://github.com/<username>/<repo_name>
COMMIT_URL="https://github.com/$REPO/commit/$COMMIT"    # The URL of the commit that triggered the workflow     => COMMIT_URL: https://github.com/<username_git>/<reponame>/commit/81ad7684a938d81
ACTOR_URL="https://github.com/$GITHUB_ACTOR"            # The URL of the user that triggered the workflow       => ACTOR_URL: https://github.com/<username_github>
ACTOR_AVATAR_URL="https://github.com/$GITHUB_ACTOR.png?size=48" # The URL of the user avatar that triggered the workflow   => ACTOR_AVATAR_URL: https://github.com/<gitusername>.png?size=48

# If event is pull_request, use GITHUB_HEAD_REF for branch name
if [[ "$EVENT_NAME" == "pull_request" ]]; then
  REF=$GITHUB_HEAD_REF                                      # The branch or tag ref that triggered the workflow   => REF=GITHUB_HEAD_REF: feat/raise-pr-2
  PR_NUMBER=$(echo $GITHUB_REF | awk -F / '{print $3}')     # The pull request number that triggered the workflow   => PR_NUMBER: 3
fi

# If event is push, use the branch name from the ref
if [[ "$EVENT_NAME" == "push" ]]; then
  REF=${REF/refs\/heads\//}                             #   The branch or tag ref that triggered the workflow   => REF: main
fi



# Determine color and pretext based on job status
if [[ "$JOB_STATUS" == "success" ]]; then
  SLACK_COLOR="good"
  SLACK_PRETEXT="Build succeeded!"
elif [[ "$JOB_STATUS" == "cancelled" ]]; then
  SLACK_COLOR="warning"
  SLACK_PRETEXT="Build was cancelled!"  
else
  SLACK_COLOR="danger"
  SLACK_PRETEXT="<!here|here> Build failed!"
fi

# Construct the JSON payload
PAYLOAD=$(cat << EOF
{
  "attachments": [
    {
      "color": "$SLACK_COLOR",
      "pretext": "$SLACK_PRETEXT",
      "author_name": "$GITHUB_ACTOR",
      "author_link": "$ACTOR_URL",
      "author_icon": "$ACTOR_AVATAR_URL",
      "fields": [
        {
          "title": "Ref",
          "value": "<$REPO_URL/tree/$REF|$REF>",
          "short": true
        },
        {
          "title": "Event",
          "value": "$EVENT_NAME",
          "short": true
        },
        {
          "title": "Github Run ID | Checks",
          "value": "<$GITHUB_RUN_ID|Github Run ID> | <$CHECKS_URL|Checks>",
          "short": true
        },
        {
          "title": "Commit",
          "value": "<$COMMIT_URL|$COMMIT>",
          "short": true
        },
        {
          "title": "Message",
          "value": "$COMMIT_MESSAGE",
          "short": true
        },
        {
          "title": "Job Status",
          "value": "$JOB_STATUS",
          "short": true
        }
      ],
      "footer": "Powered By shell",
    }
  ]
}
EOF
)

# Check if curl request succeeded otherwise exit with non zero exit code, printing a failure msg, also print the slack response received
curl -X POST -H 'Content-type: application/json' --data "$PAYLOAD" "$WEBHOOK_URL" || (echo "Slack notification failed" && exit 1)


# Print success message
echo "Slack notification succeeded"

