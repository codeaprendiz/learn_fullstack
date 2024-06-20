// JQuery
$(
    () => {
        console.log("jquery.js : this function should be called after the document is loaded.")

        console.log("Let's get the hold of the button with id send")

        $("#send").on("click",
            () => {
                console.log("Inside the button click event")
                console.log("Calling function addMessages()")
                var chatPayload = {
                    name: $('#nameId').val(),
                    message: $('#textMessageAreaId').val()
                }
                console.log("After click the chatPayload has been captured: ", chatPayload)
                postMessages(chatPayload)
                getMessages()
            }
        )
    }
)

// Function to add messages
function addMessages(message) {
    $("#messages").append(
        `
            <h4> ${message.name} </h4>
            <p> ${message.message} </p>
        `
    )

}

// Function to call /messages endpoint
function getMessages() {
    $.get(
        'http://localhost:3000/messages', (data) => {
            //console.log("Inside getMessages method: The following is the data : \n", data);
            $("#messages").empty(); // Clears the #messages element
            data.forEach(element => {
                addMessages(element);
            });
        }
    )
}

// Function to call /messages endpoint
function postMessages(payload) {
    $.post(
        'http://localhost:3000/messages', payload
    )
}