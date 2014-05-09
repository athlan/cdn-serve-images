# CDN Serve images

This application is the endpoint to serve images in correct resolution dynamically, without preparing all resolutions in advance.

Rapid installation and configuration.

## Technologies

* Written in Symfony2 (PHP 5)
* [Imagine](https://github.com/avalanche123/Imagine) library is used ([AvalancheImagineBundle for Symfony](https://github.com/avalanche123/AvalancheImagineBundle)
* Extensible, based on well written, open libraries
* Works with GD2, Imagick, Gmagick

##Basic Principles

The main purpose of Imagine is to provide all the necessary functionality to bring all native low level image processing libraries in PHP to the same simple and intuitive OO API.

Several things are necessary to accomplish that:

* Image manipulation tools, such as resize, crop, etc.
* Drawing API - to create basic shapes and advanced charts, write text on the image
* Masking functionality - ability to apply black&white or grayscale images as masks, leading to semi-transparency or absolute transparency of the image the mask is being applied to

The above tools should be the basic foundation for a more powerful set of tools that are called ``Filters`` in Imagine.

Some of the ideas for upcoming filters:

* Charting and graphing filters - pie and bar charts, linear graphs with annotations
* Reflection - apple style
* Rounded corners - web 2.0

## Configuration

Clone the project

```
git clone git@github.com:athlan/cdn-serve-images.git ./
composer install

chmod 777 ./app/cache
chmod 777 ./app/logs
chmod 777 -R im/
```

Configure in `parameters.yml`:


```
imagine_source_root:  '/path/to/originial/images'
imagine_web_root:     %kernel.root_dir%/../web
imagine_cache_prefix: im/v1
imagine_driver:       gd

# example
imagine_filters:
    120x90-crop:
        type:    thumbnail
        options: { size: [120, 90], mode: outbound }
```

After configuration run:

```
php app/console cache:clear -e prod
```

## Usage

Assume, that you are hosting app at `localhost:80` in public directory `myapp`. You have an image stored under directory `/path/to/originial/images/some/folder/image.jpg` and `imagine_source_root` set to `/path/to/originial/images/` and `imagine_cache_prefix` set to `im/v1`:

http://server/myapp/im/v1/name_of_filter/some/folder/image.jpg

## Thanks
* [Bulat Shakirzyanov (avalanche123)](https://github.com/avalanche123)

## Futher reading
* [Imagine library documentation](https://github.com/avalanche123/Imagine)
* [AvalancheImagineBundle Symfony Bundle](https://github.com/avalanche123/AvalancheImagineBundle)
