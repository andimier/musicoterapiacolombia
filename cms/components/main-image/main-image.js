function myFunction(val) {
    var rutaimagen = val.split('fakepath');
    var laimagen = rutaimagen[rutaimagen.length-1];

    $("#nm_imagen").text(laimagen);
    $("#bsubirimg").css('display', 'block');
};