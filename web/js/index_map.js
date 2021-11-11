
function preload_image(_image) {
    var image = new Image;
    image.src = _image;
}

/* 
 * Change area image onmouseover on index page 
 */
function change_image (region) {

    var ShowItem = document.getElementById("area_image");
    var LinkItem = document.getElementById("area_" + region);
    ShowItem.style.backgroundImage = 'url(/imgs/oblast_' + region + '.gif)';
    LinkItem.style.textDecoration = "underline";
    return true;
}

/* 
 * Change back area image onmouseout on index page
 */ 
function hide_image (region) {
    var ShowItem = document.getElementById("area_image");
    var LinkItem = document.getElementById("area_" + region);
    ShowItem.style.backgroundImage = 'url(/img/none.gif)';
    LinkItem.style.textDecoration = "none";
    return true;
}

