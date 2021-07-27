<?php

declare(strict_types=1);

namespace Yii\Extension\Bulma\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Yii\Extension\Bulma\AlertFlash;
use Yii\Extension\Bulma\Tests\TestSupport\TestTrait;
use Yiisoft\Session\Flash\Flash;
use Yiisoft\Session\Flash\FlashInterface;
use Yiisoft\Session\Session;

/**
 * @runTestsInSeparateProcesses
 */
final class AlertFlashTest extends TestCase
{
    use testTrait;

    private FlashInterface $flash;

    /**
     * @throws ReflectionException
     */
    public function testBodyAttributes(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyAttributes(['class' => 'test-class'])
            ->layoutBody('{body}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <span class="test-class">This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testBodyClass(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])->bodyClass('test-class')->layoutBody('{body}')->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <span class="test-class">This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testBodyContainerAttributes(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyContainer()
            ->bodyContainerAttributes(['class' => 'test-container-class'])
            ->layoutBody('{body}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <div class="test-container-class">
        <span>This is a test.</span>
        </div>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testBodyTagException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Body tag must be a string and cannot be empty.');
        AlertFlash::widget([$this->flash])->bodyTag('');
    }

    /**
     * @throws ReflectionException
     */
    public function testButtonAttributes(): void
    {
        $this->flash->add('danger', ['body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->buttonAttributes(['class' => 'has-background-danger'])
            ->layoutBody('{body}{button}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <span>This is a test.</span>
        <button type="button" class="has-background-danger"></button>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testEmpty(): void
    {
        $this->flash->add('', [], true);
        $this->assertEmpty(AlertFlash::widget([$this->flash])->render());
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderAttributes(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerAttributes(['class' => 'test-class'])
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <h4 class="test-class">Header title.</h4>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderClass(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerClass('test-class')
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <h4 class="test-class">Header title.</h4>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderContainerAttributes(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerContainer()
            ->headerContainerAttributes(['class' => 'test-class'])
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <div class="test-class">
        <h4>Header title.</h4>
        </div>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderContainerClass(): void
    {
        $this->flash->add('danger', ['header' => 'Header title.', 'body' => 'This is a test.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->headerContainer()
            ->headerContainerClass('test-container-class')
            ->layoutBody('{body}')
            ->layoutHeader('{header}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger" role="alert">
        <div class="test-container-class">
        <h4>Header title.</h4>
        </div>
        <span>This is a test.</span>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testHeaderTagException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Header tag must be a string and cannot be empty.');
        AlertFlash::widget([$this->flash])->headerTag('');
    }

    /**
     * @throws ReflectionException
     */
    public function testIconTypes(): void
    {
        $this->flash->add('danger', ['body' => 'Body message.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->class('is-flex is-align-items-center')
            ->iconAttributes(['class' => 'fa-2x mr-4'])
            ->iconTypes(['danger' => 'far fa-times-circle'])
            ->layoutBody('{icon}{body}{button}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger is-flex is-align-items-center" role="alert">
        <div><i class="fa-2x mr-4 far fa-times-circle"></i></div>
        <span>Body message.</span>
        <button type="button" class="delete"></button>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testRenderDanger(): void
    {
        $this->flash->add('danger', ['body' => 'Body message.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->class('is-flex is-align-items-center')
            ->iconAttributes(['class' => 'fa-2x is-flex-shrink-0 mr-4'])
            ->layoutBody('{icon}{body}{button}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger is-flex is-align-items-center" role="alert">
        <div><i class="fa-2x is-flex-shrink-0 mr-4 far fa-times-circle"></i></div>
        <span>Body message.</span>
        <button type="button" class="delete"></button>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    /**
     * @throws ReflectionException
     */
    public function testRenderDangerWithHeader(): void
    {
        $this->flash->add('danger', ['header' => 'Header message', 'body' => 'Body message.'], true);

        $html = AlertFlash::widget([$this->flash])
            ->bodyClass('is-underlined')
            ->bodyContainer()
            ->bodyContainerClass('has-text-weight-semibold')
            ->bodyTag('p')
            ->class('is-flex is-align-items-center')
            ->headerClass('title is-5 m-auto')
            ->headerTag('h5')
            ->iconAttributes(['class' => 'fa-2x mr-4'])
            ->layoutBody('{header}{body}')
            ->layoutHeader('{button}{icon}')
            ->render();
        $expected = <<<'HTML'
        <div id="w0-alert" class="notification is-danger is-flex is-align-items-center" role="alert">
        <button type="button" class="delete"></button>
        <div><i class="fa-2x mr-4 far fa-times-circle"></i></div>
        <div class="has-text-weight-semibold">
        <h5 class="title is-5 m-auto">Header message</h5><p class="is-underlined">Body message.</p>
        </div>
        </div>
        HTML;
        $this->assertEqualsWithoutLE($expected, $html);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->flash = new Flash(new Session([0], null));
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->flash);
    }
}
