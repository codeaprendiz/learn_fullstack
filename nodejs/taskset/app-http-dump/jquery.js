// JQuery
$(
    () => {
        console.log("jquery-http-dump jquery : this function should be called after the document is loaded.")

        console.log("Let's get the hold of the button with id send")

        $("#getRequestButtonId").on("click",
            () => {
                console.log("Inside the button click event for getRequestButton")
                console.log("Calling function displayRequestData()")
                callEndpointWithAjaxGet()
            }
        )

    }
)

function callEndpointWithAjaxGet() {
    let endpoint = $("#textAreaGetRequestInputId").val().trim();

    if (endpoint === '') {
        endpoint = '/getrequest';
    }

    // Add a slash if it does not exist and the string is not empty
    if (!endpoint.startsWith('/')) {
        console.log("Hereeeeeeeeeeeeeeeeeeeeee")
        endpoint = '/' + endpoint;
    }

    console.log("endpoint called : ", endpoint);

    $.ajax({
        url: 'http://localhost:3000' + endpoint,
        method: 'GET',
        success: (data, textStatus, jqXHR) => {
            console.log("Response data: ", data);
            console.log("Response headers: ", jqXHR.getAllResponseHeaders());
            console.log("Response textStatus: ", textStatus);

            // Add response headers to the data object
            data.responseHeaders = jqXHR.getAllResponseHeaders();
            data.status = jqXHR.status;
            displayRequestData(data);
        },
        error: (jqXHR, textStatus, errorThrown) => {
            console.error("errorThrown: ", errorThrown);
            console.error("textStatus", textStatus);
            console.error("jqXHR : ", jqXHR);
            // Parse the response JSON
            const errorResponse = JSON.parse(jqXHR.responseText);
            data = errorResponse;
            data.responseHeaders = jqXHR.getAllResponseHeaders();
            data.status = jqXHR.status
            displayRequestData(data);
            // Display the error message from the server
            // alert("Error: " + errorResponse.message);
        }
    });
}


// Function to call /messages endpoint
function callGetEndpoint() {
    let endpoint = $("#textAreaGetRequestInputId").val().trim(); // Get the value from the textarea
    console.log("endpoint called : ", endpoint);

    // Set the default value to '/getrequest' if the textarea is empty
    if (endpoint === '') {
        endpoint = '/getrequest';
    }

    $.get('http://localhost:3000' + endpoint, (data) => {
        displayRequestData(data);
    })
        .fail((jqXHR, textStatus, errorThrown) => {
            console.error("Error: ", errorThrown);
            alert("Error: Unable to fetch data from the specified endpoint. Please check the endpoint actually exists and try again.");
        });
}

// Function to display requestData
function displayRequestData(requestData) {
    $("#getRequestOutputId").replaceWith(
        `
            <h4>Request Data</h4>
            <pre>${JSON.stringify(requestData.request, null, 2)}</pre>
            <h4>Response Data</h4>
            <pre>${requestData.responseHeaders}</pre>
            <pre>Status Code: ${requestData.status}</pre>
            `
    )
}
