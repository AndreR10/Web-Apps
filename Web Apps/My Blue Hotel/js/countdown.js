$(document).ready(function(){
    $('#countdown').timeTo({
        timeTo: new Date(new Date('Sun Dec 25 2019 00:00:00 GMT+0000 (Hora padrão da Europa Ocidental)')),
        displayDays: 2,
        theme: "black",
        displayCaptions: true,
        fontSize: 48,
        captionSize: 14
    });
});