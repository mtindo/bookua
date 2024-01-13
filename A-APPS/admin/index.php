<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>APK Manager</title>
</head>
<body>
    <div class="container">
        <h1>APK Manager</h1>
        <form id="uploadForm" enctype="multipart/form-data">
            <label for="apkFile">Select APK File:</label>
            <input type="file" id="apkFile" name="apkFile" required>
            
            <label for="appName">App Name:</label>
            <input type="text" id="appName" name="appName" required>

            <label for="appVersion">App Version:</label>
            <input type="text" id="appVersion" name="appVersion" required>

            <button type="button" onclick="uploadApk()">Upload and Publish</button>
        </form>
    </div>

    <div class="container">
        <h2>Published APKs</h2>
        <div id="apkList"></div>
    </div>

    <script src="scripts.js"></script>
</body>
</html>
