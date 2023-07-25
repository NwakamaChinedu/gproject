/*
 * The document ready function which runs automatically after the HTML page is loaded.
 */
$(function () {
    //set up the click handler of the search button.
    // $("#searchButton").click(function () {
    //     searchFoundItems();
    // }

    $("#keyword").keyup(function () {
        searchFoundItems();
    }
    
    );

    //populate the table after the page is loaded.
    searchFoundItems();
} //end document ready function
);

// function to mark as collected 

function editEntry(id) {
    $.ajax({
        url: "markCollected.php",
        method: "POST",
        data: { id: id },
        success: function (response) {
            console.log('Status updated');
            // Handle the response from the server
            // For example, you can remove the row from the table:
            // $('#losttable').find('tr[data-id="' + id + '"]').remove();

            // Change the color of the button to green
            var editButton = $('#editBtn-' + id);
            editButton.removeClass('btn-danger').addClass('btn-success');
            editButton.text('Collected');
            editButton.prop('disabled', true);
        },
        
    });
}

/*
 *Function to handle search button.
 */
function searchFoundItems() {
    var keyword = $("#keyword").val();    //get value of keyword text field
    populateTable(keyword);             //populate table
} //end function

/*
Function to populate table using Ajax.
 */
function populateTable(keyword) {
    var url = "found_json.php";              //request URL
    var data = { "keyword": keyword };   //request parameters as a map

    //send Ajax request
    $.getJSON(url,
        data,
        function (result) {
            $("#losttable tbody").empty();   //remove all children first
            for (var index in result)       //iterate through the reply (in JSON)
            {
                var found = result[index];                      //get a single found items from result array
                var htmlCode = "<tr>";                        //compose HTML of a row
                htmlCode += "<td>" + found["id"] + "</td>";
                htmlCode += "<td>" + found["first_name"] + "</td>";   //compose cells
                htmlCode += "<td>" + found["last_name"] + "</td>";
                htmlCode += "<td>" + found["student_staff_id"] + "</td>";
                htmlCode += "<td>" + found["email"] + "</td>";
                htmlCode += "<td>" + found["location"] + "</td>";
                htmlCode += "<td>" + found["item_name"] + "</td>";
                htmlCode += "<td>" + found["item_type"] + "</td>";
                htmlCode += "<td>" + found["item_color"] + "</td>";
                htmlCode += "<td>" + found["item_description"] + "</td>";
                htmlCode += "<td>" + found["date_found"] + "</td>";
                htmlCode += "<td><img id='target' height='100' width='100' src='" + found["image"] + "' /></td>";

                // htmlCode += "<td>" + "<button id='editBtn-" + found["id"] + "' class='btn btn btn-danger col-md-12' type='button' onclick='editEntry(" + found["id"] + ")'>Mark Collected</button></td>";

                htmlCode += "<td><button id='editBtn-" + found["id"] + "' class='btn " + (found['status'] == 1 ? 'btn-success' : 'btn-danger') + " col-md-12' type='button' onclick='editEntry(" + found["id"] + ")' " + (found['status'] == 1 ? 'disabled' : '') + ">" + (found['status'] == 1 ? 'Collected' : 'Mark Collected') + "</button></td>";


                htmlCode += "</tr>";
                $("#losttable tbody").append(htmlCode);      //add a child to table body
            }
        } //end callback function
    ); //end function call
} //end function
