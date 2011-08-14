## Welcome ##

FanGate is an open source Facebook Page tab framework with built-in support for showing different content to fans and non-fans. It should require minimal knowledge of PHP and allow anyone who knows HTML to upload a gated fan page tab.

## How to use it ##

### Requirements ###

 * A PHP-enabled server with the cURL and JSON enabled.
 * A Facebook account
 * A Facebook Page (not your profile)

### Creating the Facebook app ###

 1. To get started, head over to the [Facebook Developer App][1] to create an app of your own. Name it whatever you want, and enter the human verification test to proceed to the settings page.

 2. On the Facebook Integration tab of the settings page, change the Tab Name to whatever you want the tab to be named, and the Tab URL to wherever you plan to host your Facebook tab. For example, if you plan to host this in a folder named `fb_tab` on `yourdomain.com`, use: `http://www.yourdomain.com/fb_tab/index.php`. Additionally, make a note of the **Application ID** and **Application Secret**, as you'll need those settings later. Click **Save Changes**, and keep this page open.

### Creating your tabs ###

 1. [Download the source from here][2] and extract it to your hard drive (more download options available [here][3]). If you have Mercurial installed, you can download the code to your machine using this command:

	hg clone https://bitbucket.org/jimmysawczuk/fangate fb_tab 

You'll find a few files inside your folder. Here are the only ones you probably need to worry about:

 * `config.php`: Paste your Application ID and Application Secret in the two define()'s in this file using the examples as a guide.
 * `like.html`, `nolike.html`: These are the files that are shown to fans and non-fans respectively. Edit them as you want, keeping in mind that they're bound by a layout set in layout.php. You can make style changes in `css/style.css` as that CSS file is included by default. Add images to whatever directory you want and reference them relatively or absolutely.

Once you've made all the changes you want, upload them to your server and ensure they're at the same path you set in your App configuration.

### Installing the App to your page ###

 1. On the app settings page, click **Application Profile Page**.
 2. On the next page, click **Add to My Page**, find for your page in the popup and click the corresponding **Add to Page** button.
 3. Navigate to your page. The tab should be installed. If it's not, click **Edit Page**, then **Apps**. Find your app in the list that follows, and click **Edit Settings**. Next to **Tab: Available**, click the add link. You can also use this menu to change the name of your tab without editing your app configuration.

  [1]: http://www.facebook.com/developers
  [2]: https://bitbucket.org/jimmysawczuk/fangate/get/tip.zip
  [3]: https://bitbucket.org/jimmysawczuk/fangate/downloads