import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Head, Link, useForm } from "@inertiajs/react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import OrganizationOnboardingController from "@/actions/App/Http/Controllers/Onboarding/OrganizationOnboardingController";
import { FormField } from "@/components/ui/form-field";
import { Stepper } from "@/components/ui/stepper";
import { home } from "@/routes";
import AppLogoIcon from "@/components/layout/app-logo-icon";
import AppLogo from "@/components/layout/app-logo";

export default function Organization() {
    const form = useForm<App.Data.Organization.CreateOrganizationData>({
        name: "",
        timezone: "UTC",
    });

    function submit(e: React.SubmitEvent<HTMLFormElement>) {
        e.preventDefault();
        form.post(OrganizationOnboardingController.store().url);
    }

    return (
        <>
            <Head title="Onboarding Organization" />
            <div className="flex min-h-svh flex-col items-center justify-center gap-6 bg-muted p-6 md:p-10">
                <div className="flex w-full max-w-md flex-col gap-6">
                    <Link
                        href={home()}
                        className="flex items-center gap-2 self-center font-medium"
                    >
                        <div className="flex  items-center justify-center">
                            <AppLogo />
                        </div>
                    </Link>
                    <Card className="w-full">
                        <CardHeader>
                            <CardTitle>Create your organization</CardTitle>
                            <CardDescription>Set up your workspace to get started.</CardDescription>
                        </CardHeader>
                        <CardContent>
                            <Stepper current={0} steps={['Organization', 'Invite team', 'Finish']} />
                            <form onSubmit={submit} className="space-y-5 mt-7">
                                <FormField label="Organization name" error={form.errors.name} htmlFor="name">
                                    <Input
                                        id="name"
                                        value={form.data.name}
                                        onChange={(e) => form.setData("name", e.target.value)}
                                        placeholder="My Agency"
                                    />
                                </FormField>

                                <Button
                                    type="submit"
                                    className="w-full"
                                    loading={form.processing}
                                >
                                    Create organization
                                </Button>
                            </form>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </>
    );
}

Organization.layout = null;
