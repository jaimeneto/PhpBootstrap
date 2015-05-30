# PhpBootstrap
A bootstrap component creator for PHP

## Basic usage

Instantiate the bootstrap 

`$bootstrap = new \PhpBootstrap\Bootstrap.php;`

Create the html element

`$div = $bootstrap->div('Content text');`


Add some attribs

```
$div->addClass('example-class');
$div->id('main_content');
$div->setAttrib('title', 'main title');
```

Append and prepend content

`$div->append(']')->prepend('[');`

Print the element

`echo $div;`  

Results:
`<div id="main_content" class="example-class" title="main title">[Content text]</div>`

## Basic HTML

### Image
```
$img = $bootstrap->img('/path/to/image.jpg', [
    'alt' => 'image alt', 
    'title' => 'image title', 
    'width' => 200, 
    'height' => 200
]);
$img->width(150)->height(150);
```

Adding some bootstrap style:
```
$img->responsive();
$img->rounded();
$img->circle();
$img->thumbnail();
```

### Lists

#### Ordered list
```
$ol = $bootstrap->ol(['item 1', 'item 2'], ['class' => 'test']);
$ol->addItem('item 3', ['class' => 'teste']);
$ol->addItem(['class' => 'teste']);
$ol->addItem(['content' => 'item 5', 'class' => 'teste']);
```

#### Unordered list
`$ul = $bootstrap->ul(['item 1', 'item 2'], ['class' => 'test']);`

Adding some bootstrap style:
```
$ul->unstyled();
$ul->inline();
```

#### Description list
```
$dl = $bootstrap->dl(['dt1' => 'dd1', 'dt2' => 'dd2'], ['class' => 'test']);
$dl->addItem('dt1', 'dd1', ['class' => 'dd-class']);
$dl->addItem('dt2', 'dd2', ['dt' => ['class' => 'dt-class'], 'dd' => ['class' => 'dd-class']]);
$dl->addItem(['content' => 'dt3', 'class' => 'dt-class'], ['content' => 'dd3', 'class' => 'dd-class']);
```

### Link
`$link = $bootstrap->link('click me', 'add/link/url');`

Alternative:

`$link = $bootstrap->a('click me', 'add/link/url');`

Setting link attributes:

```
$link->href('new/link/url');
$link->target('_blank');
```

### Fieldset

`$fieldset = $bootstrap->fieldset('The fieldset content', 'The fieldset legend');`

Alternatives:

```
$fieldset = $bootstrap->fieldset('The fieldset content');
$fieldset->legend('The fieldset legend');

$fieldset = $bootstrap->fieldset('The fieldset content', [
  'legend' => 'The fieldset legend',
  'class'  => 'default-fieldset'
]);`
```

### Form

```
$form = $bootstrap->form();
$form->setElements([
    [
        'element'     => 'hidden', 
        'name'        => 'id', 
        'label'       => 'Id'
    ], [
        'element'     => 'text', 
        'name'        => 'title', 
        'label'       => 'Title'
    ], [
        'element'     => 'textarea', 
        'name'        => 'info', 
        'label'       => 'Info',
        'rows'        => 3
    ], [
        'element'     => 'button', 
        'type'        => 'submit', 
        'name'        => 'save', 
        'label'       => 'Save'
    ], [
        'element'     => 'button', 
        'name'        => 'cancel', 
        'label'       => 'Cancel'
    ], [
        'element'     => 'group', 
        'label'       => '',
        'name'        => 'buttons', 
        'elements'    => ['save', 'cancel'],
        'clearElementsDecorators' => true
    ]
]);
```

Setting form attributes:
```
$form->action('some/url/for/submit');
$form->method('post');
$form->enctype('multipart/form-data');
```

Adding some bootstrap style:
```
$form->vertical();
$form->horizontal();
$form->inline();
```

Printing only the opening and close tags
```
echo $form->begin();
...
echo $form->end();
```

#### Adding elements

Many ways to add an element:
```
$form->addElement('text', 'title', ['label' => 'Title']);

$form->add('text', 'title', ['label' => 'Title']);

$element = $form->createElement('text', 'title', ['label' => 'Title']);
$form->addElement($element);

$element = $form->create('text', 'title', ['label' => 'Title']);
$form->addElement($element);
```

Setting elements attributes
```
$element = $form->create('text', 'title');
$element->setLabel('Title');
$element->readonly();
$element->disabled();
$element->autofocus();
$element->required();
```

Adding some bootstrap style:
```
$element->hasSuccess();
$element->hasWarning();
$element->hasError();

$element->large();
$element->small();

$element->groupLarge();
$element->groupSmall();

$element->setHelp('Some help text');
```

##### Input text, Password, Email, Hidden
```
$inputText = $form->create('text', 'title');
$inputEmail = $form->create('email', 'email');
$inputHidden = $form->create('hidden', 'id');
$inputPassword = $form->create('password', 'pswd');
```

##### Input file
```
$file = $form->create('file', 'cover', ['label' => 'Cover']);`
$file->setAccept(['.gif', '.jpg', '.png']);
```

##### Textarea
```
$textarea = $form->create('textarea', 'info', ['label' => 'Info']);`
$textarea->rows(5);
```

##### Checkbox
```
$checkbox = $form->create('checkbox', 'rememberme', ['label' => 'Remember Me']);
$checkbox->insertHiddenUncheckedValue(false);  // Default is true
$checkbox->check();
$checkbox->uncheck();
$checkbox->isChecked();
```

Adding some bootstrap style:
`$checkbox->inline(); `

Adding a group of checkboxes:
```
$checkboxGroup = $form->create('checkboxGroup', 'genres', [
  'items' => ['horror'  => 'Horror', 'drama'   => 'Drama'], 
  'value' => 'drama'
]
```

##### Radio
```
$radio = $form->create('radio', 'checkme', ['label' => 'Check Me']);
$radio->check();
$radio->uncheck();
$radio->isChecked();
```

Adding some bootstrap style:
`$radio->inline(); `

Adding a group of checkboxes:
```
$radioGroup = $form->create('radioGroup', 'gender', [
  'items' => ['M'  => 'Male', 'F'   => 'Female']
]
```

##### Select
```
$select = $form->create('select', 'sendemail', [
  'label' => 'Send e-mail', 
  'items' => ['No', 'Yes']
]);
$select->multiple(false);  // Default is true
```

Adding optgroups:
```
$select->setItems([
    'Group 1' => ['n' => 'No', 'y' => 'Yes'],
    'Group 2' => ['s' => 'Sure', 'w' => 'Whatever'],
]);
```

##### Bootstrap's StaticText
`$staticText = $bootstrap->create('StaticText', 'info', 'This is an static text');`
