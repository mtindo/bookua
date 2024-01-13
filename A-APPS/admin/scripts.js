function uploadApk() {
    var form = document.getElementById("uploadForm");
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            alert("APK Uploaded Successfully!");
            loadApkList();
        } else {
            alert("Error uploading APK. Please try again.");
        }
    };

    xhr.send(formData);
}

function loadApkList() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_apks.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var apkList = JSON.parse(xhr.responseText);
            displayApkList(apkList);
        } else {
            console.log("Error fetching APK list.");
        }
    };

    xhr.send();
}

function displayApkList(apkList) {
    var apkListDiv = document.getElementById("apkList");
    apkListDiv.innerHTML = "";

    apkList.forEach(function (apk) {
        var apkInfo = document.createElement("div");
        apkInfo.innerHTML = "<strong>Name:</strong> " + apk.appName + " | <strong>Version:</strong> " + apk.appVersion +
                            " | <a href='" + apk.filePath + "' download>Download APK</a>";
        apkListDiv.appendChild(apkInfo);
    });
}

document.addEventListener("DOMContentLoaded", function () {
    loadApkList();
});

