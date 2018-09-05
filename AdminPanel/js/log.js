function readTextFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file+"?rnd="+(Math.floor(Math.random() * 100)), false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                document.getElementById("log_details").innerHTML =  rawFile.responseText.replace(/\r\n/g, '<br>').replace(/[\r\n]/g, '<br>');

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

