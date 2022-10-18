function showPreview(event){
    if(event.target.files.length > 0){
      var src = URL.createObjectURL(event.target.files[0]);
      var preview = document.getElementById("file-ip-1-preview");
      var preview_txt = document.getElementById("txt");
      preview.src = src;
      preview.style.display = "block";
      preview_txt.style.display = "none";
    }
  }