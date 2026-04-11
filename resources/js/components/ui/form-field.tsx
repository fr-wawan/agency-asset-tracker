import { Label } from "./label";

interface Props {
    label: string;
    error?: string;
    children: React.ReactNode;
    htmlFor?: string;
}

export function FormField({ label, error, children, htmlFor }: Props) {
    return (
        <div className="space-y-3">
            <Label htmlFor={htmlFor}>{label}</Label>
            {children}
            {error && <p className="text-sm text-destructive">{error}</p>}
        </div>
    );
}
