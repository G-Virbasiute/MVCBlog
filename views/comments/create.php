


<script>
    /*
function userlocation () {
    navigator.geolocation.getCurrentPosition(function (position) {
            getUserAddressBy(position.coords.latitude, position.coords.longitude)
        },
        function (error) {
            console.log("The Locator was denied :(")
        })

    function getUserAddressBy(lat, long) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var address = JSON.parse(this.responseText)
                console.log(address.results[0].formatted_address)
            }
        };
        var usertown;
        usertown xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&key=AIzaSyDOz526glReNGZcpmidNlUZa6RjUxZ9W14", true);
        usertown = xhttp.send();
    }
return usertown;
        */
 $(document).ready(function () { 
    createCookie("town", "'GeeksforGeeks'", "10"); 
}); 
   
// Function to create the cookie 
function createCookie(name, value, days) { 
    var expires; 
      
    if (days) { 
        var date = new Date(); 
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
        expires = "; expires=" + date.toGMTString(); 
    } 
    else { 
        expires = ""; 
    } 
      
    document.cookie = escape(name) + "=" +  
        escape(value) + expires + "; path=/"; 
} 
  


</script>

<center>
        <h3 style='margin-top: 20px'>Leave a comment:</h3>
        <form action=""  method="POST" class="w3-container" enctype="multipart/form-data">
            <div id="comment_form" >

                <div>
                    <textarea rows="10" name="comment" id="comment" placeholder="Comment"></textarea>
                </div>
                <div>
                    <input type="submit" name="submit" value="Add Comment">
                </div>

            </div>
        </form>
</center>
