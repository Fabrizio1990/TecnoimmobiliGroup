function readTextFile(file)
{
    console.log(file);

    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                document.getElementById("log_details").value =  rawFile.responseText;

            }
        }
    }
    rawFile.send(null);
}


function deleteFile(fileName){
    ajaxCall(SITE_URL+"/AdminPanel/ajax/delete_file.ajax.php","logName="+fileName,null,
        function(){document.location.reload()},
        null,"POST"
    )
}