const path = require('path')
const os = require('os')

const launchUrl = 'http://zeus.dev'
const nightwatchBin = (file) => path.resolve('./node_modules/nightwatch/bin/' + file)

module.exports = {
  'src_folders': [
    'tests/e2e'
  ],
  'output_folder': false,   // './tests/e2e/storage' reports (test outcome) output by nightwatch
  'selenium': {             // downloaded by selenium-download module (see readme)
    'start_process': true,  // tells nightwatch to start/stop the selenium process
    'server_path': nightwatchBin('selenium.jar'),
    'host': '127.0.0.1',
    'port': 4444,           // standard selenium port
    'cli_args': {           // chromedriver is downloaded by selenium-download (see readme)
      'webdriver.chrome.driver': nightwatchBin('chromedriver')
    },
    'screenshots': {
      'enabled': true,
      'on_failure': true,
      'on_error': true,
      'path': './tests/e2e/storage/screenshots'
    }
  },
  'test_settings': {
    'default': {
      'end_session_on_fail': false,
      'launch_url': launchUrl,
      'desiredCapabilities': { // use Chrome as the default browser for tests
        'browserName': 'chrome',
        'javascriptEnabled': true // turn off to test progressive enhancement
      }
    }
  }
}

/**
 * selenium-download does exactly what it's name suggests;
 * downloads (or updates) the version of Selenium (& chromedriver)
 * on your localhost where it will be used by Nightwatch.
 */
var BINPATH = path.resolve('./node_modules/nightwatch/bin/');
require('fs').stat(nightwatchBin('selenium.jar'), function (err, stat) { // got it?
  if (err || !stat || stat.size < 1) {
    require('selenium-download').ensure(BINPATH, function (error) {
      if (error) throw new Error(error); // no point continuing so exit!
      console.log('✔ Selenium & Chromedriver downloaded to:', os.EOL + BINPATH);
    });
  }
});
