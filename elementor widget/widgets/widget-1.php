<?php
namespace Elementor_Test_Addon;
class Elementor_Hello_World_Widget_1 extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Button';
	}

	public function get_title() {
		return esc_html__( 'Button', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Button', 'button' ];
	}

	protected function register_controls() {

		
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Button', 'elementor-test-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		//title
		$this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'Text', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click here', 'elementor-test-addon' ),
				'placeholder' => esc_html__( 'Click here', 'elementor-test-addon' ),
			]
		);

		//url
		$this->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-test-addon' ),
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
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
				'label' => esc_html__( 'Button', 'elementor-test-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		//Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .button-class',
			]
		);
		//text shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'label' => esc_html__( 'Text Shadow', 'elementor-test-addon' ),
				'selector' => '{{WRAPPER}} .btn-style',
			]
		);
		//color
		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-test-addon' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .btn-style' => 'color: {{VALUE}}',
				],
			]
		);
		//background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'elementor-test-addon' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button-class',
			]
		);
		//Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border Type', 'elementor-test-addon' ),
				'separator'	=> 'before',
				'selector' => '{{WRAPPER}} .button-class',
			]
		);
		//Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'elementor-test-addon' ),
				
				'selector' => '{{WRAPPER}} .button-class',
			]
		);
			//Padding
			$this->add_control(
				'padding',
				[
					'label' => esc_html__( 'Padding', 'elementor-test-addon' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					
					'size_units' => [ 'px', '%', 'em' ],
					'separator'	=> 'before',
					'selectors' => [
						'{{WRAPPER}} .button-class' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);
			
			$this->end_controls_section();


	}

	protected function render() {
			$settings = $this->get_settings_for_display();
			?>
		<div class="btn" style="text-align: <?php echo esc_attr( $settings['text_align'] ); ?>;">
			<a  href="<?php echo esc_url( $settings['website_link']['url'])?>" class="button-class">
					<span class="btn-style"><?php echo esc_html__($settings['widget_title']); ?></span>
				</a>
		</div>
			

		<?php
	}
}