var fbRoot  = document.getElementById('fb-root');
var body    = document.getElementsByTagName('body')[0];

if (fbRoot === null) {
    fbRoot = document.createElement('div');
    fbRoot.setAttribute('id', 'fb-root');
    body.insertBefore(fbRoot, body.firstChild);
}