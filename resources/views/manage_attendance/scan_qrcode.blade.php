<html>

{{-- <script src="{{ asset('js/html5-qrcode.min.js') }}"></script> --}}
<script src={{ asset('js/html5-qrcode.min.js') }}></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<div id="reader" style="height: 100%" ></div>
<input id="invisible_id" name="class_id" type="hidden" value="{{ $teacher }}">
<div id="output"></div>



</html>


<script>
    classid = document.getElementById('invisible_id').value;
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: 800
        });


    function onScanSuccess(decodedText, decodedResult) {

        console.log(`Scan result: ${decodedText}`, decodedResult);
        result = parseInt(decodedText);
        // console.log("THIS IS SUPPOSED INTEGER VALUE");
        // console.log(result);
        // Post the result using an API 

        axios.post('{{ URL('api/qrcodescan') }}', {
                class_id: classid,
                student_id: result


            })
            .then(function(response) {
                console.log(response);
            })
            .catch(function(error) {
                console.log(error.response.data);
                console.log(error.response.data.message);
                console.log("Something happened here");
            });


        html5QrcodeScanner.clear();
        window.location.replace("{{ route('studAttendance.reviewScan') }}");

    }

    html5QrcodeScanner.render(onScanSuccess);
</script>
