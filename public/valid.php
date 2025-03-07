<?

use Valitron\Validator;

$patern_phone = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
$rules = [
    'lengthMax' => [
        ['name', 100]
    ],
    // 'lengthMin' => [
    //     ['name', 1]
    // ],
    // 'lengthMax' => [
    //     ['phone', 2]
    // ],
    'required' => ['name', 'phone'],
    // 'numeric' => ['phone'],
    'integer' => ['phone'],
    // 'regex' => [
    //     ['name', '/[A-zА-яЁё]{1,100}$/u'],
    //     ['phone', $patern_phone]
    // ],
 
    // 'boolean'=>['check', 1]
];

$labels = [
    "name" => "имя",
    "phone" => "телефон",
];

if (!empty($_POST)) {
    \Valitron\Validator::lang('ru');
    $v = new \Valitron\Validator($_POST);
    $v->labels($labels);
    $v->rules($rules);
    if ($v->validate()) {
       
        // header('location:public/index.php');

        $name = $_POST['name'];
        $phone = $_POST['phone'];
      

        print_r($_POST);

        $sql = "INSERT INTO `users` (`name`,`phone`) VALUES (?, ?)";
        $res = $pdo->prepare($sql);
        $res->execute([$name, $phone]);


        header('location: /');
        $_SESSION['success'] = 'данные отправлены';
    } else {
        $errors = '<ol>';
        foreach ($v->errors() as $error) {
            foreach ($error as $item) {
                $errors .= "<li>{$item}</li>";
            }
        }
        $errors .= '</ol>';
        $_SESSION['errors'] = $errors;
    }
}
