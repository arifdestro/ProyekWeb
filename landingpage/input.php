<!-- input gambar -->

<img id="blah" alt="your image" width="300" height="400" />
<br>
<br>
<input type="file" 
    onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">