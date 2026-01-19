document.addEventListener("DOMContentLoaded", function() {
    window.loadAppointments = function(status, btn = null) {

        document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
        if(btn) btn.classList.add("active");

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_appointments.php?status=" + status, true);
        xhr.onreadystatechange = function() {
            if(xhr.readyState === 4){
                if(xhr.status === 200){
                    document.getElementById("appointmentData").innerHTML = xhr.responseText;
                } else {
                    console.error("Failed to load appointments", xhr.status, xhr.responseText);
                }
            }
        };
        xhr.send();
    };
});