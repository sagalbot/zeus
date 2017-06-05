# Zeus

> Automated end-to-end testing for WordPress, guaranteed to make you feel like a greek god.
 
### Install
 
1. `cd wp-content/plugins`
2. `git clone https://github.com/sagalbot/zeus.git`
3. `cd zeus && composer install` 
4. Activate Zeus plugin from `wp-admin`

### Commands

```bash
wp zeus generate
```
Generate a JSON sitemap to be used for testing.

```bash
wp zeus test
```
Run e2e test suite.