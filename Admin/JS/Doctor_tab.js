function showTab(tabId) {
    document.getElementById("addDoctor").style.display = "none";
    document.getElementById("viewDoctors").style.display = "none";

    document.querySelectorAll(".tab-btn").forEach(btn => {
        btn.classList.remove("active");
    });

    document.getElementById(tabId).style.display = "block";

    if (tabId === "addDoctor") {
        document.querySelectorAll(".tab-btn")[0].classList.add("active");
    } else {
        document.querySelectorAll(".tab-btn")[1].classList.add("active");
    }
}
