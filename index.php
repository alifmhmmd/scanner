<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRCode Scanner</title>
    <!-- include the library -->
    <script src="https://unpkg.com/html5-qrcode@2.3.7/html5-qrcode.min.js"></script>
</head>
<body>
    <div style="align: center">
        <h3>Scanner</h3>
        <div id="qr-reader" style="width: 350px"></div>
    </div>

    <script>
        // This method will trigger user permissions
        Html5Qrcode.getCameras().then(devices => {
        /**
         * devices would be an array of objects of type:
         * { id: "id", label: "label" }
         */
        if (devices && devices.length) {
            var cameraId = devices[0].id;
            // .. use this to start scanning.
        }
        }).catch(err => {
        // handle err
        });
        
        function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        // console.log(`Code matched = ${decodedText}`, decodedResult);
        alert(decodedText);
        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader",
        { fps: 10, qrbox: {width: 200, height: 200} },
        /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);

        // const html5QrCode = new Html5Qrcode(/* element id */ "qr-reader" ,true);
        // html5QrCode.start(
        // cameraId, 
        // {
        //         fps: 10,    // Optional, frame per seconds for qr code scanning
        //         qrbox: { width: 250, height: 250 }  // Optional, if you want bounded box UI
        //     },
        //     (decodedText, decodedResult) => {
        //         // do something when code is read
        //     },
        //     (errorMessage) => {
        //         // parse error, ignore it.
        //     })
        //     .catch((err) => {
        //     // Start failed, handle it.
        // });
    </script>
</body>
</html>