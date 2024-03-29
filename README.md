# Research Software Directory plugin for WordPress

This repo contains a WordPress integration of the Projects and Software overview for the Research Software Directory, using the RSD API.

## How to use the plugin

To display the overview (e.g. for the Software section for the Netherlands eScience Center organisation) on your Wordpress site, use the following shortcode in any post or page:
```shell
[research_software_directory section="software" limit="4" organisation="35c17f17-6b5f-4385-aa8b-6b1d33a10157"]
```

## Local development

This plugin can be used in a new or existing WordPress intallation in a local development environment. For a super quick testing environment, the bundled `docker-compose.yml` can be used with the application [Local](https://localwp.com/).

First make sure your WordPress installation is functional, then move the plugin file to the `plugins` folder of your installation, which is usually something like `<wordpress_folder>/wp-content/plugins/`.

### Editor configuration

This project uses [EditorConfig](https://editorconfig.org/) to maintain a consistent coding style. Please make sure your editor applies this configuration to any of your code changes for this repo.

### WordPress Coding Standards

To ensure code quality and adherence to coding conventions, before committing any changes to the code of this project, please use `phpcs` (see [WordPress Coding Standards for PHP_CodeSniffer](https://github.com/WordPress/WordPress-Coding-Standards)) with the bundle PHP_CS configuration file.
