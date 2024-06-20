#!/bin/bash

# Define a function to check a variable
check_variable() {
    local var_name="$1"            # Get the name of the variable passed as an argument
    local var_value="${!var_name}" # Indirect expansion to get the value of the variable named by var_name

    # Check if the variable is set and not null
    : "${var_value:?Variable $var_name is empty}"

    # Check if the variable is "None"
    if [[ "$var_value" == "None" || "$var_value" == "null" ]]; then
        echo "Variable $var_name is $var_value. Exiting"
        exit 1
    fi

}



# Sample JSON object
json_object='{"somekey": "example_value"}'

# Example pipeline
export SOMEVAR=$(echo $json_object | jq -r -e ".somekey1") ; check_variable "SOMEVAR"

echo "Variable SOMEVAR is assigned with: $SOMEVAR"
