function withAjax() {

    var keyword = document.getElementById("searchInput").value;

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById("doctorResult").innerHTML = this.responseText;
        }
    };

    xhttp.open(
        "GET",
        "../PHP/searchDoctor.php?keyword=" + encodeURIComponent(keyword),
        true
    );

    xhttp.send();
}
