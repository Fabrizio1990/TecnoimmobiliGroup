// REQUIRE JQUERY

function uploadFile(uploadPage,fileInputId){
  var input = document.getElementById(fileInputId);
  file = input.files[0];
  if(file != undefined){
    formData= new FormData();
    if(!!file.type.match(/image.*/)){
      formData.append("image", file);
      $.ajax({
        url: uploadPage,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
            alert('success');
        },
		error: function(){
			alert('error!');
		}
      });
    }else{
      alert('Not a valid image!');
    }
  }else{
    alert('Input something!');
  }
}