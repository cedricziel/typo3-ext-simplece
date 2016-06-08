# typo3-ext-simplece

Very minimal example Extension for building a simple TYPO3 CMS content element that uses a new column on 
the `tt_content` table.

Just for demo purposes. This extension carries a minimal page template that overrides any other object in `page.10`.

## Installation/Configuration:

* clone the extension to `typo3conf/ext`: `git clone https://github.com/cedricziel/typo3-ext-simplece.git simplece`
* install the extension using the extension manager
* include the following static templates:
    * fluid_styled_content
    * simple ce
* include the simple ce PageTSConfig template through the page property of your root page

# License

GPLv3
