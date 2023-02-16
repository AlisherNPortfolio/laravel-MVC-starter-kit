<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>
My starter kit

<hr>

## About Starter Kit

Would-be features:

- Admin panel
- Role and permissions
- Blog
- Media manager
- Gallery
- Multi-language
- Survey widget
- Menu manager with drag and drop feature
- Website settings
- And other features

## Install
1. Clone the project
2. Configure ```.env``` file
3. Run **migration** files
4. Run **seeders**

## Starter kit access data
admin panel url: ``site.loc/admin``
<br>
 login: ``admin``
 <br>
 password: ``admin123``
 
## Usage

**Translations initialization**
- Import ```App\Classes\Translating``` trait inside a model
- Define translating fields in `$translatings` array property like 
    ```bash 
    public $translatings = ['field1', 'field2', ...]
    ```
- Give casting fields: 
    ```bash 
    protected $casts = [
        'field1' => App\Casts\TranslatableCast::class
    ];
    ```

**Translations usage in a view**
- `$model->field1` - gets value with default language
- Using with input (inside create or update view): 
    ```bash
  @include('admin.layouts.components.translation_input',
    [
        'type' => 'input', // available types: input, textarea
        'name' => 'name', // input name
        'id' => 'category_name',
        'class' => 'form-control',
        'placeholder' => 'Category name',
        'slugable' => 'slug', // for sluggable input. works only with input type
        'value' => $model->original('field1') // use on an update view
    ])
  ```
- Show translated field in a show view
    ```bash 
    @include('admin.layouts.components.show_translating', ['items' => $model->original('field1')])
    ```

##Upload files via File Manager extension
1. Upload using a button.

   Use following code in a view:
   ```
        @include('admin.layouts.components.filemanager', ['name' => 'input_name'])
   ```
    Available options:
    * ``name`` - input tag name;
    * ``class`` - input class;
    * ``multiple`` - multiple uploading (upcoming option). Default value: ``false``
    
2. Upload on a ckeditor

**Using Thumbnails**

- In order to use thumbnails, import `App\Classes\ThumbnailGenerator` trait in a model
- This trait also uses `$file_name` property the same as `ModelUploader` trait
- Use `thumbnail()` method in a view to generate and get a thumbnail image:
    ```bash
      thumbnail('field_name', 'width_x_height', false); // params: field_name, thumbnail sizes, use aspect_ratio (default false)
    ```
    ```bash
      <img src="{{ $model->thumbnail('field1', '90x20') }}">
    ```
- In order to delete thumbnail after deleting a record, in a model use following:
     ```bash
      protected static function boot()
      {
          parent::boot();
          static::deleting(static function (Model $model) {
              $model->deleteImageAndThumbnail();
          });
      }
    ```
  
#Old codes
Following codes had been used in old version of the project. Now, all file uploading is performing via Laravel File Manager extension by [Unisharp](https://unisharp.github.io/laravel-filemanager/) 

**Image uploading**
- Import `App\Classes\UploadImage\ModelUploader` trait inside a model
- Define field name which saving name of uploading image: `public $file_name = 'field1';`
- Use `uploadImage()` method in a controller create and update actions after a $model
    ```bas
    $model->create(...);
    $model->uploadImage();
    ```
  or
    ```bas
    $model->update(...);
    $model->uploadImage();
    ```

## !!!Warning!!!
- The project is in a beginner stage! So, there might be a lot of bugs! After completing a test version, all of codes will be refactored!
- `UploadImage` classes should use design patterns. There is need refactoring all code
- `ThumbnailGenerator` trait should use design patterns. There is need refactoring all code. Old thumbnails should be deleted after updating a record 
