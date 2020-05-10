<?php
/**
 * DrinkQuality theme functions and definitions
*/

/**
 * Sets up theme defaults.
*/

function awesomedrink_theme_setup() {
    // Make theme available for transalation
    load_theme_textdomain( 'awesomedrink', get_template_directory() . '/ languages' );

    // Register Navigation Menu
    $my_menus = array(
        'primary' => __( 'Header Menu', 'awesomedrink' ),
        'secondary' => __( 'Footer Menu', 'awesomedrink' ),
    );
    register_nav_menus( $my_menus );

    // Activate Custom Background
    add_theme_support( 'custom-background' );

    // Activate Custom Header
    add_theme_support( 'custom-header' );

    // Activate Featured Image
    add_theme_support( 'post-thumbnails' );

    // Activate Post Formats 
    add_theme_support( 'post-formats', array( 'image', 'quote' ) );

    // Switch default markup for comment list, comment form etc to output valid HTML5 
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );

};

add_action( 'after_setup_theme', 'awesomedrink_theme_setup' );

/**
 * Enqueue scripts and styles.
*/

function awesomedrink_load_scripts() {
    // Theme stylesheet
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.min.css', false, '4.4.1', 'all');
    wp_enqueue_style( 'raleway', "https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap");
    wp_enqueue_style( 'fontawesome', "https://use.fontawesome.com/releases/v5.11.2/css/all.css");
    wp_enqueue_style( 'awesomedrink', get_template_directory_uri() . '/assets/css/awesomedrink.css', array(), '1.0.0', 'all' );
    // Theme Javacript
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.4.1', true );
    wp_enqueue_script( 'awesomedrink', get_template_directory_uri() . '/assets/js/awesomedrink.js', array('jquery'), '1.0.0', true );
};

add_action( 'wp_enqueue_scripts', 'awesomedrink_load_scripts' );

/**
 * Register Widget Area.
*/

function awesomedrink_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'awesomedrink' ),
        'id' => 'awesomedrink-sidebar',
        'description' => __('Add widgets here to appear in your main sidebar.', 'awesomedrink'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
};

add_action( 'widgets_init', 'awesomedrink_widgets_init' );

// Adding alternation to login error message
add_filter( 'login_errors',
create_function(
'$a', '"Invalid username or
password.";'
) );

// Hiding version WP in the head
add_filter( 'the_generator', '__return_null' );

// Standard Api Call and response
function awesomedrink_calling_dbcoktail($app_token, $endpoint) {
    $request_uri = 'https://www.thecocktaildb.com/api/json/v2/' . $app_token . $endpoint;
    $request = wp_remote_get( $request_uri );
    $response = wp_remote_retrieve_body( $request );
    $drinks = json_decode( $response );
    return $drinks;
}

// Searching for popular
function awesomedrink_calling_popular_drink( $attributes = array() ) {
    
    $attributes = shortcode_atts( array(
        'app_token' => '',
        'limit' => '20',
    ), $attributes);

    $limit = $attributes['limit'];
    if($limit > 20 || $limit == 'max') {
        $limit = 20;
    };
    $app_token = $attributes['app_token'];
    
    $drinks = awesomedrink_calling_dbcoktail($app_token, '/popular.php');
    ob_start();
    echo'<h1 class="front-page-title">Most popular drink</h1><div class="card-container">';
    foreach( $drinks as $data => $drink) {
        for ($i=0; $i < $limit ; $i++) {
            $current_drink = $drink[$i];
            $drink_id = $current_drink->idDrink;
            $drink_name = $current_drink->strDrink;
            $drink_img = $current_drink->strDrinkThumb;
            $drink_glass = $current_drink->strGlass;     
            $drink_category = $current_drink->strCategory;
            $drink_instruction = $current_drink->strInstructions;
            $drink_ingredient1  = $current_drink->strIngredient1;             
            $drink_ingredient2  = $current_drink->strIngredient2;             
            $drink_ingredient3  = $current_drink->strIngredient3;             
            $drink_ingredient4  = $current_drink->strIngredient4;             
            $drink_ingredient5  = $current_drink->strIngredient5;             
        ?>
        <div class="awesomedrink-card">
            <div class="awesomedrink-card_image"> <img src="<?php echo($drink_img)?>"/> </div>
            <div class="awesomedrink-card_title text-white">
                <p><?php echo($drink_name)?></p>
            </div>
        </div>
        <div class="awesomedrink-card_details hide">
            <div class="awesomedrink_card_box">
                <div class="awesomedrink-card_details_image">
                    <img src="<?php echo($drink_img)?>" alt="<?php echo($drink_name)?>">
                </div>
                <div class="awesomedrink-card_details_text">
                    <h2><?php echo($drink_name)?></h2>
                    <p><strong>Category:</strong> <?php echo($drink_category) ?></p>
                    <p><strong>Glass:</strong> <?php echo($drink_glass) ?></p>
                    <p><strong>Ingredients:</strong> <?php echo($drink_ingredient1) ?>, <?php echo($drink_ingredient2) ?>, <?php echo($drink_ingredient3) ?></p>
                    <p><?php echo($drink_instruction) ?></p>
                </div>
                <span class="close_box">&times;</span>
            </div>
        </div>

    <?php
        }
    };
    echo'</div>';
    if ($limit == 5) {
        echo '<div class="findmorelink"><a href="'. esc_url( home_url( '/drinks' ) ) . '">Find More...</a></div>';
    };
    
    return ob_get_clean();
};

// Ingredients
function awesomedrink_calling_list_ingredients() {
    $drinks = awesomedrink_calling_dbcoktail('1', '/list.php?i=list');
    $limit = 10;
    ob_start();
    echo'<h1 class="front-page-title">Best Bottles in the World</h1><div class="card-container">';
    foreach( $drinks as $data => $drink) {
        for ($i=0; $i < $limit ; $i++) {
            $current_drink = $drink[$i];
            $drink_name = $current_drink->strIngredient1;     
        ?>
        <div class="awesomedrink-card bottles">
            <div class="awesomedrink-card_image"> <img src="https://www.thecocktaildb.com/images/ingredients/<?php echo($drink_name); ?>.png"/> </div>
            <div class="awesomedrink-card_title text-white">
                <p><?php echo($drink_name)?></p>
            </div>
        </div>

    <?php
        }
    };
    echo'</div>';
    
    return ob_get_clean();
};


add_shortcode( 'PopularDrink', 'awesomedrink_calling_popular_drink' );
add_shortcode( 'Ingredients', 'awesomedrink_calling_list_ingredients' );
