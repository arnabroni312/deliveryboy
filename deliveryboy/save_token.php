<html>
<head>
<title>Authenticating</title>
</head>
<body>
<b>Authenticating user, Please wait...</b>
<script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.1/firebase-database.js"></script>
<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
<script>
var token = getParameterByName("token");
var userId=getParameterByName("user_id");
 var config = {
                apiKey: "AIzaSyBstXjDaC5M2i_KGKWKx3Xa263SQL_H1oI",
				authDomain: "pother-panchali-delivery.firebaseapp.com",
				databaseURL: "https://pother-panchali-delivery.firebaseio.com",
				projectId: "pother-panchali-delivery",
				storageBucket: "pother-panchali-delivery.appspot.com",
				messagingSenderId: "518287642291",
				appId: "1:518287642291:web:d4ab602d3130dea546eac6"
            };
firebase.initializeApp(config);
firebase.database().ref('delivery_boys/' + token).set({
    id:userId
}).then(()=>{
	var dbRef = firebase.database().ref('delivery_boys/' + token);
	dbRef.on('value', function(snapshot) {
    window.location.href="viewdetails.php";
});
});
		
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
</script>
</body>