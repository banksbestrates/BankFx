=== Formidable Digital Signatures ===
Requires at least: 3.8
Tested up to: 4.7.2
Stable tag: 1.10

== Changelog ==
= 1.10 =
* Show signature image with field ID shortcode in free version

= 1.09 =
* Prevent the signature field from being black if no background color is selected in the styling settings
* Fix error when signature is empty
* Make sure px doesn't break signature image size
* Update use of frm_graph_value hook
* Add translation template file

= 1.08 =
* Add compatibility with free version of Formidable
* Get the plugin URL based on the plugin
* Fix values that aren't saved in the correct format

= 1.07.05 =
* Add download ID

= 1.07.04 =
* Add back-up signature creation

= 1.07.03 =
* Set background color to transparent
* Don't let the textarea overlap the box
* Fix signature in default message
* Make sure the size is set correctly depending on the field options

= 1.07.02 =
* Allow bgColour transparent
* Add frm_sig_output_options filter
* Fix issue with width getting set too low when the field is hidden on page load
* Update from formidablepros.com

= 1.07.01 =
* Fix issue with signature box colors on sites that started with 2.0+
* Move the javascript out of the page and into a js file

= 1.07 =
* Update for Formidable v2.0 compatability
* Fix ambiguous js focus with multiple signatures on a page

= 1.06 =
* Updated deprecated function for checking when hidden
* Call validation hook earlier, so Formidable will clear error message for drafts

= 1.05 =
* Added frm_sig_multiplier hook for those hitting memory limits
* Update for Formidable v1.07.02 compatibility
* Check for conditional logic before required
* Add height:auto to typed signature

= 1.04 =
* Fix signature typing
* Update to v2.5.0 of the signature javascript
* Include typed signature when editing an entry with no written signature

= 1.03 = 
* Keep signature height and width saved after entry is updated
* Update to v2.3.0 of the signature javascript
* Smooth out signatures

= 1.02 =
* Fixed responsive signature pad
* Update the auto-update checking
* Allow signing on edit if there was not signature submitted on create

= 1.01 =
* Allow different sizes of signature fields on the same page
* Move signature javascript to footer
* Fix to size signature field if it is conditionally hidden on page load

= 1.0 =
* Updated the way javascripts are loaded for WP < 3.3
* Allow for dynamic height and width on display

= 1.0rc1 =
* Switch to draw tab as default
* Improved the UI on front-end
* Moved validation from signature javascript to regular Formidable messages
* Added sizing and label options with auto sizing down depending on available space
* Updated auto-update process

= 1.0b2 =
* Added filtering on the graphs to show the typed name
* Added a check for multiple forms on a page, to make sure the edited entry is for the correct form

== TODO ==
* add orientationchange change event for signature size
