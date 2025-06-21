<?php return 
array (
  'navigation' => 
  array (
    'props' => 
    array (
      'showTopBar' => true,
      'sticky' => true,
      'overlap' => true,
      'width' => 'boxed',
      'layoutType' => 'logo-spacing-menu',
    ),
    'style' => 
    array (
      'ancestor' => 
      array (
        'sticky' => 
        array (
          'background' => 
          array (
            'color' => '#ffffff',
          ),
        ),
      ),
      'background' => 
      array (
        'color' => 'transparent',
      ),
      'padding' => 
      array (
        'top' => 
        array (
          'value' => '20',
        ),
      ),
    ),
  ),
  'logo' => 
  array (
    'props' => 
    array (
      'layoutType' => 'image',
    ),
  ),
  'header-menu' => 
  array (
    'props' => 
    array (
      'sticky' => true,
      'hoverEffect' => 
      array (
        'type' => 'bordered-active-item bordered-active-item--bottom',
        'group' => 
        array (
          'border' => 
          array (
            'transition' => 'effect-borders-grow grow-from-center',
          ),
        ),
        'activeGroup' => 'border',
        'enabled' => true,
      ),
      'showOffscreenMenuOn' => 'has-offcanvas-tablet',
    ),
  ),
  'title' => 
  array (
    'style' => 
    array (
      'textAlign' => 'center',
    ),
  ),
  'hero' => 
  array (
    'style' => 
    array (
      'background' => 
      array (
        'type' => 'none',
        'color' => '#03a9f4',
        'overlay' => 
        array (
          'shape' => 
          array (
            'value' => 'none',
            'isTile' => false,
          ),
          'light' => false,
          'color' => 
          array (
            'value' => '#000000',
            'opacity' => 80,
          ),
          'enabled' => true,
          'type' => 'gradient',
          'gradient' => 
          array (
            'angle' => '320',
            'steps' => 
            array (
              0 => 
              array (
                'color' => 'rgba(62, 183, 208, 0.2)',
                'position' => '40',
              ),
              1 => 
              array (
                'color' => '${theme.colors.4}',
                'position' => 0,
              ),
            ),
            'name' => 'october_silence',
          ),
        ),
        'image' => 
        array (
          0 => 
          array (
            'source' => 
            array (
              'url' => 'aerial-background.jpg',
              'gradient' => 
              array (
                'name' => 'october_silence',
                'angle' => 0,
                'steps' => 
                array (
                  0 => 
                  array (
                    'position' => '0',
                    'color' => '#b721ff',
                  ),
                  1 => 
                  array (
                    'position' => '100',
                    'color' => '#21d4fd',
                  ),
                ),
              ),
            ),
            'attachment' => 'scroll',
            'position' => 
            array (
              'x' => 52.24647759569451,
              'y' => 0,
            ),
            'repeat' => 'no-repeat',
            'size' => 'cover',
            'useParallax' => false,
          ),
        ),
        'slideshow' => 
        array (
          'duration' => 
          array (
            'value' => 1500,
          ),
          'speed' => 
          array (
            'value' => 1500,
          ),
        ),
        'video' => 
        array (
          'videoType' => 'external',
          'externalUrl' => 'https://www.youtube.com/watch?v=y5zFszln1ao',
          'internalUrl' => 'https://static.colibriwp.com/assets/sources/colibri-demo-video.mp4',
          'poster' => 
          array (
            'url' => 'https://static.colibriwp.com/assets/sources/colibri-demo-video-cover.jpg',
          ),
        ),
      ),
      'padding' => 
      array (
        'top' => 
        array (
          'value' => '50',
          'unit' => 'px',
        ),
        'bottom' => 
        array (
          'value' => '50',
          'unit' => 'px',
        ),
      ),
      'separatorBottom' => NULL,
    ),
    'props' => 
    array (
      'layoutType' => 'textWithMediaOnRight',
      'heroSection' => 
      array (
        'layout' => 'textWithMediaOnRight',
      ),
    ),
  ),
);
