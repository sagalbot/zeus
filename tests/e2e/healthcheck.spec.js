const http = require('http');
const map = require('./config/map.json');
const config = require('./config/site.json');

let tests = {};

map.forEach(function (post) {

  if (post.post_status === 'publish') {

    tests[`${post.post_title}`] = browser => {
      browser.url(post.guid).expect.element('body').to.be.present.before(500);

      http.request({
        host: post.guid,
        // port: 80,
        path: '',
        method: "HEAD"
      }, res => {
        browser.assert.equal(res.statusCode, 200, 'Check status');
      }).end()

    }
  }

});

module.exports = tests;