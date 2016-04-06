$(document).ready(function() {


    $('#type').on('change',function(){
        if( $(this).val()==="standlone"){
            var html = '<label for="standlone">Screen shots:</label><input data-device="standlone" type="file" id="standlone" name="standlone[]" multiple> <div id="selectedFilesS"></div><br/> ';
            $("#website").empty()
            $("#standlone").append(html);
        }

        else if( $(this).val()==="website"){

            var html = '<label for="link" >Link</label><input type="url" id="link" name="link" value=""/><label for="files" > Desktop:</label><input data-device="desktop" type="file" id="files" name="files[]" multiple required=""> <div id="selectedFilesD"> </div> <label for="mobile">Mobile: </label><input data-device="mobile" type="file" id="mobile" name="mobile[]" multiple><br/>  <div id="selectedFilesM"></div>';

            $("#standlone").empty();
            $("#website").append(html);
        }
/*multiple image preview first input*/

    $("#files").on("change", handleFileSelect);

    selDiv = $("#selectedFilesD");
    //$("#myForm").on("submit", handleForm);

    $("body").on("click", ".selFile", removeFile);

/*end image preview */

/* Multiple image preview second input*/
    $("#mobile").on("change", handleFileSelect);

    selDivM = $("#selectFilesM");
    //$("#myForm").on("submit", handleForm);

    $("body").on("click", ".selFile", removeFile);

    console.log($("#selectFilesM").length);

/* end preview*/

    $("#standlone").on("change", handleFileSelect);

    selDivS = $("#selectFilesS");
    //$("#myForm").on("submit", handleForm);

    $("body").on("click", ".selFile", removeFile);

    console.log($("#selectFilesS").length);

/*end preview*/

    $("#galleryfiles").on("change", handleFileSelect);

    selDivE = $("#selectFilesS");
    //$("#myForm").on("submit", handleForm);

    $("body").on("click", ".selFile", removeFile);

    console.log($("#selectFiles").length);


    });

    /*
    * preview in edit portfolio
    * desktop view
    * mobile view
    * standlone
    */

    ////////////////////////////////////////////

    /*standlone*/

    $("#editstandlone").on("change", handleFileSelect);
    selDivS = $("#selectFilesS");
    $("body").on("click", ".selFile", removeFile);
    console.log($("#selectFilesS").length);


    /*desktop*/
    $("#editdesktop").on("change", handleFileSelect);
    selDiv = $("#selectedFilesD");
    $("body").on("click", ".selFile", removeFile);
    console.log($("#selectFilesD").length);



    /*mobile*/
    $("#editmobile").on("change", handleFileSelect);
    selDivM = $("#selectFilesM");
    $("body").on("click", ".selFile", removeFile);
    console.log($("#selectFilesM").length);

});




/*multiple image preview*/


var selDiv = "";
// var selDivM="";
var storedFiles = [];

function handleFileSelect(e) {

    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    var device = $(e.target).data("device");
    filesArr.forEach(function(f) {

        if (!f.type.match("image.*")) {
            return;
        }
        storedFiles.push(f);

        var reader = new FileReader();
        reader.onload = function(e) {
            var html = "<div><img src=\"" + e.target.result + "\" data-file='" + f.name + "' class='selFile' title='Click to remove'>" + f.name + "<br clear=\"left\"/></div>";

            if (device == "mobile") {
                $("#selectedFilesM").append(html);
            } else if(device == "desktop") {
                $("#selectedFilesD").append(html);
            }else {
                $("#selectedFilesS").append(html);
            }

        }
        reader.readAsDataURL(f);
    });

}

function handleForm(e) {
    e.preventDefault();
    var data = new FormData();

    for (var i = 0, len = storedFiles.length; i < len; i++) {
        data.append('files', storedFiles[i]);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'handler.cfm', true);

    xhr.onload = function(e) {
        if (this.status == 200) {
            console.log(e.currentTarget.responseText);
            alert(e.currentTarget.responseText + ' items uploaded.');
        }
    }

    xhr.send(data);
}

function removeFile(e) {
    var file = $(this).data("file");
    for (var i = 0; i < storedFiles.length; i++) {
        if (storedFiles[i].name === file) {
            storedFiles.splice(i, 1);
            break;
        }
    }
    $(this).parent().remove();
}



function handleFileSelectUpdate(e) {

    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);
    var device = $(e.target).data("device");
    filesArr.forEach(function(f) {

        if (!f.type.match("image.*")) {
            return;
        }
        storedFiles.push(f);

        var reader = new FileReader();
        reader.onload = function(e) {
            var html = "<div><img src=\"" + e.target.result + "\" data-file='" + f.name + "' class='selFile' title='Click to remove'>" + f.name + "<br clear=\"left\"/></div> <button id=\"button\" name=\"button\">Submit</button>";
            if(device == "desktop") {
                $("#selectedFilesD").append(html);
            }

        }
        reader.readAsDataURL(f);
    });

}