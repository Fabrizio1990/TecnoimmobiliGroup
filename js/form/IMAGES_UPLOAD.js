/* ############## FUNCTION INIT_DRAG_DROP_LISTENER ##############
 upload_page = page that will recive the call
 el_class    = elements that will trigger drag and drop , DEF is "FILE_DRAG"
*/
function INIT_DRAG_DROP_LISTENER(upload_page,el_class = "FILE_DRAG") {
	DROP_FILES_LIMIT = 1;
	
	if (!window.File || !window.FileList || !window.FileReader) alert("FILE DRAG NOT SUPPORTED");
	var F = document.getElementsByClassName(el_class);
	for(var i = 0, max = F.length ; i < max ; i++){
		F[i].addEventListener("dragover" , function(e){ e.stopPropagation(); e.preventDefault(); }, false);
		F[i].addEventListener("dragleave", function(e){ e.stopPropagation(); e.preventDefault(); }, false);
		F[i].addEventListener("drop", function(e){SEND_DROP_FILES(e,upload_page,function(resp){UPDATE_IMAGE_FIELD(resp,e.target)},DROP_FILES_LIMIT)}, false);
	}
}    
  
function SEND_DROP_FILES(e,upload_page,callback = null,limit = 10){
	e.stopPropagation();
	e.preventDefault();
	var files = e.target.files || e.dataTransfer.files; 
	if(files.length > limit){
		files = new Array(files[0]);
	}
	UPLOAD_FILES(files,upload_page,callback);
}

function UPDATE_IMAGE_FIELD(image_path,elem){
    elem.src = image_path+"?"+Math.random(0,50);
}
  
function SEND_INP_FILES(file_elem,upload_page,callback =null){
	for(var i = 0 , max = file_elem[0].files.length ;i<max ; i++)
		UPLOAD_FILES(new Array(file_elem[0].files[i]),upload_page,callback);
}
  
function UPLOAD_FILES(files,upload_page,callback = null) {
	var AJAX = new XMLHttpRequest();
	if (!AJAX.upload) { alert("AJAX NOT SUPPORTED"); return; }
	AJAX.onreadystatechange = function(e) {
		if(AJAX.readyState==4) {
		    if(AJAX.status==200){
		        if(callback)
		            callback(AJAX.responseText.trim());
                console.log("OK");
            }else{
                console.log("ERROR");
            }
        };
	};


	for(var i=0,FILE; FILE=files[i]; i++) {
        AJAX.open("POST", upload_page, true);
		AJAX.setRequestHeader("X-File-Type", FILE.type);
		AJAX.setRequestHeader("X-FILENAME", FILE.name);

        params = FILE;
		AJAX.send(params);
	}
}

