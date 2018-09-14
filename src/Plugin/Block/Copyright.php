<?php
 namespace Drupal\copyright\Plugin\Block;

 use Drupal\Core\Block\BlockBase;

    /**
     * @Block(
     * id = "copyright_block",
     * admin_label = @Translation("Copyright"),
     * category = @Translation("Custom")
     * )
     */
class Copyright extends BlockBase {
        /**
         * {@inheritdoc}
         */
    public function defaultConfiguration()
    {
        return ['web_name' => '', ];
    }
    /**
     * {@inheritdoc}
     */
    public function blockForm($form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $form['web_name'] = [
            '#type' => 'textfield', '#title' => t('Website name'),

            '#default_value' => $this->configuration['web_name'],
        ];
        return $form;
    }
    /**
     * {@inheritdoc}
     */

    public function blockSubmit($form, \Drupal\Core\Form\FormStateInterface $form_state)
    {
        $this->configuration['web_name'] = $form_state->getValue('web_name');
    }
    /**
     * {@inheritdoc}
     */
    public function build()
    {
        $date = new \DateTime();
        return [
            '#markup' => t('<div id="copyright">Copyright @year &copy; @web</div>', [
                '@year' => $date->format('Y'),
                '@web' => $this->configuration['web_name'],
            ]),
        ];
    }
}