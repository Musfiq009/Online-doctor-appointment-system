document.addEventListener("DOMContentLoaded", function() {
    window.loadAppointments = function(status, btn = null) {

        document.querySelectorAll(".tab-btn").forEach(b => b.classList.remove("active"));
        if(btn) btn.classList.add("active");

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "get_appointments.php?status=" + status, true);
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState === 4){
                if(xhttp.status === 200){
                    document.getElementById("appointmentData").innerHTML = xhttp.responseText;
                } else {
                    console.error("Failed to load appointments", xhttp.status, xhttp.responseText);
                }
            }
        };
        xhttp.send();
    };

    window.refreshCurrentTab = function() {
        var activeBtn = document.querySelector(".tab-btn.active");
        if(activeBtn){
            var status = activeBtn.textContent.trim();
            loadAppointments(status, activeBtn);
        }
    };
    window.acceptAppointment = function(id, type) {
        var time = '';
        if(type === 'Online'){
            time = prompt("Enter online consultation time (HH:MM):");
            if(!time) return;
            time += ":00"; 
        }

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET","update_appointment_status.php?action=accept&id="+id+"&time="+encodeURIComponent(time),true);
        xhttp.onreadystatechange = function(){
            if(xhttp.readyState===4 && xhttp.status===200){
                console.log("Accept Response:", xhttp.responseText);
                refreshCurrentTab();
            }
        };
        xhttp.send();
    };
    window.rejectAppointment = function(id){
        var xhttp = new XMLHttpRequest();
        xhttp.open("GET","update_appointment_status.php?action=reject&id="+id,true);
        xhttp.onreadystatechange = function(){
            if(xhttp.readyState===4 && xhttp.status===200){
                console.log("Reject Response:", xhttp.responseText);
                refreshCurrentTab();
            }
        };
        xhttp.send();
    };
});