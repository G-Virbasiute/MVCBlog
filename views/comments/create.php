<script>
(function () {
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
                console.log(address.results[6].formatted_address)
                var result = address.results[6].formatted_address
                document.cookie = "town=" + JSON.stringify(result) + ";";


            }
        }
        xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+long+"&key=AIzaSyDOz526glReNGZcpmidNlUZa6RjUxZ9W14", true);
        xhttp.send();
    }
})();


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
