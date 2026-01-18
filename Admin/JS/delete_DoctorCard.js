function deleteDoctor(doctorId) {

    if (!confirm("Are you sure you want to delete this doctor?")) {
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../PHP/delete_doctor.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {

            try {
                var response = JSON.parse(xhr.responseText);

                if (response.status === "success") {
                    var card = document.getElementById("doctor-" + doctorId);
                    card.style.opacity = "0";
                    setTimeout(() => card.remove(), 300);
                } else {
                    alert(response.message);
                }

            } catch (e) {
                alert("Server response error");
            }
        }
    };

    xhr.send("id=" + doctorId);
}
