<?php

namespace Fractas\Seeder;

use Exception;
use Faker\Factory;
use Folder;

/**
 * Simple embedding of Unsplash photos for SilverStripe Seeder Provider class.
 * Provider by https://source.unsplash.com/
 */
class UnsplashImageProvider extends \Seeder\Provider
{
    /**
     * @var
     */
    private $faker;

    /**
     * Type of Unsplash image method (collection)
     * @var string
     */
    private static $type = 'random';

    /**
     * Width value of generated image
     * @var string
     */
    private static $width = 800;

    /**
     * Height value of generated image
     * @var string
     */
    private static $height = 600;

    /**
     * @var string
     */
    public static $shorthand = 'UnsplashImage';

    public function __construct()
    {
        parent::__construct();
        $this->faker = Factory::create();
    }

    /**
     * @param $argumentString
     * @return array
     */
    public static function parseOptions($argumentString)
    {
        $arguments = array_map(function ($arg) {
            return intval(trim($arg));
        }, explode(',', $argumentString));

        $options = array();
        if (count($arguments) >= 3) {
            $options['type'] = $arguments[0];
            $options['width'] = $arguments[1];
            $options['height'] = $arguments[2];
        } elseif (count($arguments) == 2) {
            $options['type'] = $arguments[0];
            $options['width'] = $arguments[1];
            $options['height'] = $arguments[1];
        } elseif (count($arguments) == 1) {
            $options['type'] = $arguments[0];
        }

        return $options;
    }

    /**
     * @param $field
     * @param $state
     * @throws Exception
     * @returns null
     */
    protected function generateField($field, $state)
    {
        throw new Exception('Image provider does not support generating db fields');
    }

    /**
     * @param $field
     * @param $state
     * @return mixed
     */
    protected function generateOne($field, $state)
    {
        return $this->createImage($field, $state);
    }

    /**
     * @param $field
     * @param $state
     * @return array
     */
    protected function generateMany($field, $state)
    {
        $images = array();

        for ($i = 0; $i < $field->count; $i++) {
            $images[] = $this->createImage($field, $state);
        }

        return $images;
    }

    /**
     * @param $field
     * @param $upState
     * @return mixed
     */
    private function createImage($field, $upState)
    {
        $type = self::$type;
        $width = self::$width;
        $height = self::$height;

        if (!empty($field->options['type'])) {
            $type = $field->options['type'];
        }

        if (!empty($field->options['height'])) {
            if (strpos($field->options['height'], ',') !== false) {
                $height = explode(',', $field->options['height']);
                $height = intval($this->faker->numberBetween(min($height), max($height)));
            } else {
                $height = intval($field->options['height']);
            }
        }

        if (!empty($field->options['width'])) {
            if (strpos($field->options['width'], ',') !== false) {
                $width = explode(',', $field->options['width']);
                $width = intval($this->faker->numberBetween(min($width), max($width)));
            } else {
                $width = intval($field->options['width']);
            }
        }

        $folder = Folder::find_or_make('Seeder/Unsplash');

        $file = file_get_contents("https://source.unsplash.com/{$type}/{$width}x{$height}");
        $fileName = uniqid('test-image') . '.jpg';
        file_put_contents($folder->getFullPath() . DIRECTORY_SEPARATOR . $fileName, $file);

        $imageClassName = $field->dataType;
        $image = $imageClassName::create();
        $image->Filename = $fileName;
        $image->Title = $this->faker->Sentence;
        $image->setParentID($folder->ID);

        $state = $upState->down($field, $image);
        $this->writer->write($image, $field, $state, true);

        return $image;
    }
}
