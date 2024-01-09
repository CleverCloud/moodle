
![Clever Cloud log](/clevercloud/github-assets/clever-cloud-logo.png)

This repository is a fork from Moodle.

Moodle <https://moodle.org> is a learning platform designed to provide
educators, administrators and learners with a single robust, secure and
integrated system to create personalised learning environments. [Clever Cloud](https://www.clever-cloud.com) is a rock solid IT automation platform, that allows developpers to deploys apps fast and secure.

You can download Moodle <https://download.moodle.org> and use this repo as a model, or clone it and deploy it directly on Clever Cloud.

## How to Deploy

### ⚙️ Declare the Application and Add-on

Clone this repository, and on Clever Cloud:

1. Create a new [PHP](https://developpers-staging.cleverapps.io/doc/applications/php/) application
2. Choose **Git deployment**
3. Add a [MySQL](https://developpers-staging.cleverapps.io/doc/addons/mysql/) add-on
4. Add the following [environment variables](https://developpers-staging.cleverapps.io/doc/develop/env-variables/)

```shell
CC_PHP_VERSION="8"
MAX_INPUT_VARS="5000"
URL="<your-url"
```

### 📁 Set Up `moodledata` Folder

This will allow you to store your files outside of your application and [is required by Moodle to run](https://docs.moodle.org/403/en/Site_backup).

1. Create an **[FS Bucket](https://developpers-staging.cleverapps.io/doc/addons/fs-bucket)** add-on
2. Link it to your PHP application
3. In your FS Bucket dashboard, find the path variable (it should look like this: `CC_FS_BUCKET=/some/empty/folder:bucket-<bucket_id>`)
4. Add this variable to your **PHP application**, replace `/some/empty/folder` by `/moodledata`.
5. Update changes

### 🌐 Set Up Domain

Moodle needs an URL declared in variables to work properly. You can set it up in **Domains names**, from your PHP application menu. If you don't have a domain name yet, you can use a `cleverapp.io` subdomain provided by Clever Cloud for test purposes.

Don't forget to update `URL="<your-url"` if you haven't yet.

### 🚀 Deploy

Time to push your code!

1. Get the remote in your application menu > **Information**
2. Add it to Git: `git remote add clever <clever-remote-url>`
3. Push your code: `git push clever -u master`

💡 If you get a reference error when pushing, try this: `git push clever main:master`.

**Note**: This repository is already configurend to run `/admin/cli/cron.php` every minute as a [CRON job](https://developpers-staging.cleverapps.io/doc/administrate/cron/).

## 🎓 Further Help

See [Moodle installation documentation](https://docs.moodle.org/403/en/Installation_quick_guide) for further help and development configuration.
