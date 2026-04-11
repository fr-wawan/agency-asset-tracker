import AppLogoIcon from '@/components/layout/app-logo-icon';

export default function AppLogo() {
    return (
        <>
            <div className="flex aspect-square size-9 items-center justify-center rounded-md bg-sidebar-primary text-sidebar-primary-foreground">
                <AppLogoIcon className="size-6 stroke-white" />
            </div>
            <div className="ml-1 grid flex-1 text-left">
                <span className=" font-semibold leading-tight tracking-wide">
                    Arcivo
                </span>
            </div>
        </>
    );
}
