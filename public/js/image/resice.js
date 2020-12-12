var Jimp = require('jimp');
 
// open a file called "lenna.png"
Jimp.read('http://api.masbeneficiosconfiteca.com/images/OJBoe7FtRPPYWJzIhSTKvrDgi1ikeFpbYXNaEn7G.jpeg', (err, lenna) => {
  if (err) throw err;
  lenna
    .resize(256, 256) // resize
    .quality(60) // set JPEG quality
    .greyscale() // set greyscale
    .write('lena-ee.jpeg'); // save
});