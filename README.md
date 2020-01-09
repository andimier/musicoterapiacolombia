
# CMS

## Architectutre
This is a components based architecture.
Components are called from the main.php file based on the user content selection, section or content.
Each component has one -html.php and one component-name.php (logic) file.

If js logic is neaded, the file must sit inside the corresponding component directory and be called from the bundler file.

### PHP Functions
There is a file (required/php_functions.php) that contains all the php native functions. This is meant to be used as an esaier way to update the syntaxis if needed.
This where all php methods must be inserted.

### Text editing
For the text editing there is a functionality which only allows link tags and line breaks at the moment. This is found in the text-edit.js file.

### CRUD
A folder named CRUD contains all the logic within files needed to update the data base.

## CSS
Files are of type SASS, which leave inside a SASS folder in the CMS parent directory.

## Task Runner
Gulp does the compiling for SASS files.

## JS
A file colled js-bundler.php inserts the files at the bottom of the page. This is where any new js file must be called from.

Crear tipos de contenidos: list, text
 las listas van a ser []

1. Meta Tags
2. Contenidos
3. Galería de Fotos

Para la seccion Quienes somos
Para las bolas las listas deben tener otro tipo de lista. Al crar el contenido tipo lista,
esta también debe tener
un tipo
    [
        "type": "circulos",
        "lista": []
    ]

    $s_arr = serialize($arr);
    print_r(unserialize($s_arr));

## DB
Tables structure:

Items
|id|seccion_id|contanido_id|tipo|fecha|titulo|contenido|imagen

Textos
|id|title|subTitle|item_id|text

Sections
|id|seccion|plantila

```
sections: [
    {
        id: int 11,
        title: varchar 255,
        position: Int 11,
        contentImageSet: text
    }
]
```
```
contentItems: [
    {
        id:
        sectionID:
        parentItemID:
        contentType: String / parent type [section, content]
        galleryID:
        isSubContent: Boolean,
        contentDesignType: String[olist, uList, text, profile],
        visible: Boolean,
        fecha:
        title:
        subTitulo:
        contentImageSet: String[],
        // subContentsTypes: [],
        // textos: [],
        // items: []
    }
]
```


Etapas / entregas
1. Edicion de contenidos y textos
2. Edicion de secciones
3. Inserción y borrado de Secciones - CMS y Front.
4. Cambio funcionalidad edicion de textos
