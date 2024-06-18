# Slack Notify Github Actions

This script is designed to integrate GitHub Actions with Slack notifications. It allows you to automatically send custom notifications to a specified Slack channel whenever a GitHub Actions workflow is triggered. The notifications provide detailed insights about the workflow, including information about the user who triggered the event, the repository and commit involved, the event type, job status, as well as links to the GitHub Run and Checks page.

The main goal is to provide real-time feedback on your CI/CD process directly in Slack, enabling faster response times in case of failed workflows and improved visibility of your project's status across your team.

## Usage

You can use the following github action yaml for this

```yaml
      - name: Notify on Slack
        if: always()
        run: |
          bash $GITHUB_WORKSPACE/.github/workflows/scripts/slack.sh
        env:
          SLACK_WEBHOOK_URL: "${{ secrets.SLACK_WEBHOOK_URL }}"
          GITHUB_HEAD_REF: ${{ github.head_ref }}
          GITHUB_EVENT_PATH: ${{ github.event_path }}
          JOB_STATUS: ${{ job.status }}
          REPO: ${{ github.repository }}
          # Return github.event.pull_request.head.sha in pull_request event, github.sha in push event
          COMMIT: ${{ github.event.pull_request.head.sha || github.sha }}
          AUTHOR: ${{ github.actor }}
          ACTION: ${{ github.action }}
          EVENT_NAME: ${{ github.event_name }}
          REF: ${{ github.ref }}
          WORKFLOW: ${{ github.workflow }}
          JOB: ${{ github.job }}
          # Return github.event.pull_request.title in pull_request event, github.event.head_commit.message in push event
          COMMIT_MESSAGE: ${{ github.event.pull_request.title || github.event.head_commit.message }}
```

## Explain the following syntax in slack payload

```json
          "value": "<$REPO_URL/tree/$REF|$REF>",
```

This syntax is used to create a hyperlink within Slack messages.

Let's break it down:

- `"$REPO_URL/tree/$REF"` is the actual URL that the hyperlink will point to. This URL is used to link to a specific branch in your GitHub repository.

  - `$REPO_URL` is the URL to the root of your GitHub repository. It takes the form `https://github.com/username/repositoryname`.
  - `tree/$REF` is added to the end of the repo URL to create a link to a specific branch. `$REF` is the name of the branch.

- `"$REF"` is the label for the hyperlink that will be displayed in the Slack message. This will usually be the branch name.

- The vertical bar (`|`) separates the URL from the label.

So, `<$REPO_URL/tree/$REF|$REF>` in Slack will be displayed as a hyperlink with the label as the branch name, and clicking on it will take you to the branch on GitHub.

For example, if `$REPO_URL` is `https://github.com/username/repositoryname` and `$REF` is "main", then the hyperlink in Slack would display as "[main](https://github.com/username/repositoryname/tree/main)", and clicking on "main" would take you to the "main" branch of your repository on GitHub.
