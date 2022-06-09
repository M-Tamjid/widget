<?php
namespace Elementor_Test_Addon;

class Elementor_Hello_World_Widget_2 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Title';
	}

	public function get_title() {
		return esc_html__( 'Title', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Title', 'title' ];
	}

  protected function register_controls() {
    $this->start_controls_section(
      'content_section',
			[
				'label' => esc_html__( 'Title', 'elementor-test-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
    );
    //title
		$this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'Text', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Add Your Heading Text Here​', 'elementor-test-addon' ),
				'placeholder' => esc_html__( 'Enter your title', 'elementor-test-addon' ),
        'separator' => 'after'
			]
		);
    	//url
		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-test-addon' ),
				
				'label_block' => true,
				'separator'	=>	'before'
			]
		);
    //Alignment
    $this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementor-test-addon' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementor-test-addon' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementor-test-addon' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justify', 'elementor-test-addon' ),
						'icon' => 'eicon-text-align-justify',
					]
				],
				'default' => 'left',
				'toggle' => true,
			]
		);
    $this->end_controls_section();

    $this->start_controls_section(
      'content_section2',
			[
				'label' => esc_html__( 'Title', 'elementor-test-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
    );

    //color
    $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .widget-title' => 'color: {{VALUE}}',
				],
			]
		);
    //Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .widget-title',
			]
		);
    //text shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'label' => esc_html__( 'Text Shadow', 'elementor-test-addon' ),
				'selector' => '{{WRAPPER}} .widget-title',
			]
		);
    //Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border Type', 'elementor-test-addon' ),
				'separator'	=> 'before',
				'selector' => '{{WRAPPER}} .widget-title',
			]
		);
    $this->end_controls_section();
  }

  protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
  <a href="<?php echo esc_html__($settings['website_link']['url']) ?>">
    <h2 class="widget-title">
    <?php echo esc_html__($settings['widget_title']); ?>
    </h2>
  </a>
    <?php
  }
}