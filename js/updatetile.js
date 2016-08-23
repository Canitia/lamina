function updateTile(message, imgUrl, imgAlt) {

// Namespace: Windows.UI.Notifications

if (typeof Windows !== 'undefined'&& typeof Windows.UI !== 'undefined' && typeof Windows.UI.Notifications !== 'undefined') {

    var notifications = Windows.UI.Notifications,

    tile = notifications.TileTemplateType.tileSquare150x150PeekImageAndText01,

    tileContent = notifications.TileUpdateManager.getTemplateContent(tile),

    tileText = tileContent.getElementsByTagName('text'),

    tileImage = tileContent.getElementsByTagName('image');



    tileText[0].appendChild(tileContent.createTextNode(message || 'InsideUWP'));

    tileImage[0].setAttribute('src', imgUrl || 'https://insideuwp.xyz/win-tiles/small.jpg');

    tileImage[0].setAttribute('alt', imgAlt || 'Logo');



    var tileNotification = new notifications.TileNotification(tileContent);

    var currentTime = new Date();

    tileNotification.expirationTime = new Date(currentTime.getTime() + 600 * 1000);

    notifications.TileUpdateManager.createTileUpdaterForApplication().update(tileNotification);

} else {

//Alternative behavior

}

}
