# PhpBootstrap
A bootstrap component creator for PHP

## Basic usage
```
$bootstrap = new \PhpBootstrap\Bootstrap.php;`   // Instantiate the bootstrap
$div = $bootstrap->div('Content text');          // Create the html element

$div->addClass('example-class');                 // Add CSS Class
$div->id('main_content');                        // Set element id
$div->setAttrib('title', 'main title');          // Set an attrib
$div->append(']')->prepend('[');                 // Append and prepend content
echo $div;                                       // Print the element
```

Results:
```
<div id="main_content" class="example-class" title="main title">[Content text]</div>
```

Other methods
```
$div->removeClass('example-class');             // Remove a CSS Class
$div->removeAttrib('title');                    // Remove an attribute
$div->aria('hidden', 'true');                   // Set an aria attrib
$div->data('value', '100');                     // Set a data attrib
$div->setStyle('width', '100%');                // Set style
$div->setStyle([                                // Set multiple styles
    'font-weight' => 'bold', 
    'color:black'
]);  
$div->removeStyle('background');                // Remove style
$div->srOnly(true);                             // Screen reader only
```

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
```
$ul = $bootstrap->ul(['item 1', 'item 2'], ['class' => 'test']);
```

Adding some bootstrap style:
```
$ul->unstyled();
$ul->inline();
```

#### Description list
```
$dl = $bootstrap->dl(['dt1' => 'dd1', 'dt2' => 'dd2'], ['class' => 'test']);
$dl->addItem('dt1', 'dd1', ['class' => 'dd-class']);
$dl->addItem('dt2', 'dd2', [
    'dt' => ['class' => 'dt-class'], 
    'dd' => ['class' => 'dd-class']
]);
$dl->addItem(['content' => 'dt3', 'class' => 'dt-class'], 
             ['content' => 'dd3', 'class' => 'dd-class']);
```

### Link
`$link = $bootstrap->link('click me', 'add/link/url');`

Alternative:
```
$link = $bootstrap->a('click me', 'add/link/url');
```

Setting link attributes:
```
$link->href('new/link/url');
$link->target('_blank');
```

### Fieldset
```
$fieldset = $bootstrap->fieldset('The fieldset content', 'The fieldset legend');
```

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

Printing the form
```
echo $form;
```

Printing only the opening and close tags
```
echo $form->begin();
foreach($form->getElements() as $element) echo $element;
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
```
$checkbox->inline(); 
```

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
```
$radio->inline(); 
```

Adding a group of radio buttons:
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

##### Button
```
$button = $form->create('button', 'cancel', ['label' => 'Cancel']);
$submit = $form->create('button', 'save', ['type' => 'submit', 'label' => 'Save']);
$reset = $form->create('button', 'reset', ['type' => 'reset', 'label' => 'Reset']);
```

Setting button attributes:
```
$button->type('submit');  // options: button, submit or reset
```

Adding some bootstrap style:
```
$button->blockLevel();
$button->active();

$button->large();
$button->small();
$button->extraSmall();

$button->btnClass('primary');  // Options: default', 'primary', 'success', 
                               // 'info', 'warning', 'danger', 'link'
```

##### Bootstrap's StaticText
```
$staticText = $bootstrap->create('StaticText', 'info', 'This is an static text');
```

##### Grouping elements
```
$group = $form->create('group', 'buttons');
$group->addElement($save);
$group->addElement($cancel);
```

##### Using element decorators

###### InputGroup decorator
```
$inputText = $form->create('text', 'test');
$inputText->addDecorator('inputGroup', [
    'prependAddon' => '@',
    'appendAddon'  => '*'
]);
```

###### HelpBlock decorator
```
$inputText = $form->create('text', 'test');
$inputText->addDecorator('helpblock', [
    'name'      => 'helpblock', 
    'content'   => 'This is a help text!'
]);
```

###### Label decorator
```
$inputText = $form->create('text', 'test');
$inputText->addDecorator('label', [
    'name'      => 'label', 
    'placement' => 'after'      // Options: before, after, wrap, append, prepend
]);
```

###### Wrapper decorator
```
$inputText = $form->create('text', 'test');
$inputText->addDecorator('wrapper', [
    'name'  => 'formgroup',
    'class' => 'form-group'
]);
```

## Bootstrap components

Adding block styles:
```
$element->center();
$element->pullLeft();
$element->pullRight();

$element->clearfix();

$element->show();
$element->hidden();
$element->invisible();
```

Adding style to background:
```
$element->setBackground('primary');

$element->bgPrimary();
$element->bgSuccess();
$element->bgInfo();
$element->bgWarning();
$element->bgDanger();
```

Adding tooltip:
```
$element->tooltip('Tooltip text', 'left');
```

Setting text aligment:
```
$element->textAlign('right');

$element->textRight();
$element->textLeft();
$element->textCenter();
$element->textJustify();
```

Transforming text:
```
$element->textTransform('uppercase');

$element->uppercase();
$element->lowercase();
$element->capitalize();
```

Setting text style:
```
$element->textStyle('muted');

$element->textMuted();
$element->textHide();
$element->textPrimary();
$element->textSuccess();
$element->textInfo();
$element->textWarning();
$element->textDanger();
```

Other text options:
```
$element->textNoWrap();
$element->lead();
$element->small();
```

Setting visibility on devices:
```
// $device options: 'xs', 'sm', 'md', 'lg', 'print'
// $type options: 'block', 'inline', 'inline-block', 'hidden'
$element->setVisibility($device, $type);

//Or use the methods as the examples below:
$element->visibleXsBlock();
$element->visibleMdInline();
$element->hiddenXs();
$element->hiddenPrint();
```

### Alert
```
$alert = $bootstrap->alert('alert message', 'warning');
$alert->alertStyle('danger');       // Options: success, info, warning, danger
$alert->dismissible(false);         // Hide the "X" to hide the message
```

### Badge
```
echo $bootstrap->badge(40);
```

### Label
```
$label = $bootstrap->label('New!', 'info');
$label->labelStyle('success');     // Options: 'default', 'primary', 'success', 
                                   // 'info', 'warning', 'danger'
```

### Jumbotron
```
echo $bootstrap->jumbotron('Add some nice text here');
```

### Caret
```
echo $bootstrap->caret();
```

### PageHeader
```
echo $bootstrap->pageHeader('The title', 'extra info');
```

### Well
```
$well = $bootstrap->well('Some nice text', 'lg');
$well->small();
$well->large();
```

### Glyphicon
```
$icon = $bootstrap->glyphicon('user');
$icon = $bootstrap->icon('user');
$icon->setIcon('plus');
```

### Panel
```
$ponel = $bootstrap->panel('Panel body', [
    'heading' => 'Panel heading', 
    'footer'  => 'Panel footer'
]);
$panel->setHeading('Panel title', 'h3');
$panel->panelStyle('warning');   // Options: 'default', 'primary', 'success', 
                                 // 'info', 'warning', 'danger'
```

### ProgressBar
```
$progressBar = $bootstrap->progressBar(50, '50%');
$progressBar->progressBarStyle('success');   // Options: 'success', 'info', 
                                             // 'warning', 'danger'
$progressBar->setMin(0);
$progressBar->setMax(100);
```

### Tabs
```
$tabs = $bootstrap->tabs([
    ['content' => 'Home', 'href' => '/home', 'active' => true], 
    ['content' => 'Contact', 'href' => '/contact', 'disabled' => true],
    'About' => '/about'
], ['id' => 'myTabs']);
$tabs->navJustified();
$tabs->navStacked();
```

### Pills
```
echo $bootstrap->pills([
    ['content' => 'Home', 'href' => '/home', 'active' => true], 
    'About' => '/about'
]);
```

### Breadcrumbs
```
echo $bootstrap->breadcrumbs([
    'Home' => '/home',
    ['content' => 'Library', 'href' => '/library'],
    ['content' => 'Data', 'href' => '/data', 'active' => true],
], ['id' => 'myBreadcrumbs']);
```

### Pagination
```
$pagination = $bootstrap->pagination(3, 'http://www.jaimeneto.com/');
$pagination->large();
$pagination->small();

$pagination->href('http://www.phpbootstrap.com/')
$pagination->page(3);
$pagination->previousLabel('Previous')
$pagination->nextLabel('Next');
```

### Dropdown
```
$dropdown = $bootstrap->dropdown('Dropdown', [
    'Dropdown header' => 'HEADER',
    'Action'          => '/action',
    'Divider'         => 'DIVIDER',
    'Another action'  => '/another-action',
], ['id' => 'test']);

$dropdown->setButton('Dropdown', ['class' => 'test']);
$dropdown->getButton()->btnClass('primary');

$dropdown->menuRight();
$dropdown->menuLeft();

$dropdown->up();
$dropdown->down();
```

### Carousel
```
$bootstrap->carousel([
    [
        'img'         => 'image1.jpg',
        'title'       => 'Image 1',
        'description' => 'Description for image 1',
        'active'      => true
    ], [
        'img'         => 'image2.jpg',
        'title'       => 'Image 2',
        'description' => 'Description for image 2'
    ], [
        'img'         => new Img('image3.jpg'),
        'title'       => 'Image 3',
        'description' => 'Description for image 3',
    ]
], 'myCarousel');

$carousel->hideControls();
$carousel->hideIndicators();
$carousel->setPreviousLabel('Previous');
$carousel->setNextLabel('Next');
```

### ListGroup
```
echo $bootstrap->listGroup(['item 1', 'item 2']);
```

### Modal
```
$modal = $bootstrap->modal('Modal body', ['id'     => 'myModal', 
                                          'header' => 'Modal title']);
$modal->fade(false);
$modal->header('Modal title', 'h3', 'Close');
$modal->footer('Modal footer');

$modal->large();
$modal->small();
```

### Navbar
```
$navbar = $bootstrap->navbar([
    ['content' => 'Home', 'href' => '/home', 'active' => true], 
    ['content' => 'Contact', 'href' => '/contact']
], ['id' => 'test']);
$navbar->setHeader('Brand', '/home');
$navbar->inverse();

$navbar->staticTop();
$navbar->fixedTop();
$navbar->fixedBottom();
```

Setting items floating right
```
$navbar->setItems([
    ['content' => 'Profile', 'href' => '/profile'], 
    ['content' => 'Logout', 'href' => '/logout']
], null, true);
```

Setting a form
```
$this->navbar->setForm([
    [
        'element'     => 'text', 
        'name'        => 'search', 
        'placeholder' => 'Search'
    ], [
        'element'     => 'button', 
        'type'        => 'submit',
        'name'        => 'search_btn',
        'label'       => 'Search',
        'btnClass'    => 'default'
    ]
], [
    'role'  => 'search', 
    'class' => 'navbar-right'
], true);
```

